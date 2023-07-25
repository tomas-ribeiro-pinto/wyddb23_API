<?php

namespace App\Http\Controllers;

use App\Models\FetchedInstagramPost;
use App\Models\Image;
use App\Models\InstagramPost;
use App\Models\StoryGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Post;

class InstagramController extends Controller
{
    public function index()
    {
        // Fetch Instagram Posts from WYD Don Bosco 23 Instagram Account
        $response = Http::get('https://graph.instagram.com/me/media?fields=id&access_token=' . env('INSTAGRAM_ACCESS_TOKEN'));

        if($response->ok())
        {
            $postsJson = json_decode($response)->data;

            $posts = collect();

            $tmp = 0;

            foreach ($postsJson as $post) if ($tmp <= 5){
                // Fetch Post Media IDs
                $response = Http::get('https://graph.instagram.com/' . $post->id . '/children?&access_token=' . env('INSTAGRAM_ACCESS_TOKEN'));

                $mediaJson = json_decode($response)->data;

                foreach($mediaJson as $asset)
                {
                    // Fetch Image by ID
                    $response = Http::get("https://graph.instagram.com/" . $asset->id . "?fields=id,media_type,media_url,username&access_token=" . env('INSTAGRAM_ACCESS_TOKEN'));

                    $responseJson = json_decode($response);;

                    if($responseJson->media_type == 'IMAGE')
                    {
                        $posts->add($responseJson->media_url);
                    }
                }
                $tmp++;
            }

            return view('posts.index', compact('posts'));
        }
        else
            Log::error('API response code: ' . $response->status());

        $posts = [];
        return view('posts.index', compact('posts'));
    }

    public function show()
    {
        $posts = InstagramPost::all();
        return view('posts.show', compact('posts'));
    }

    public function store()
    {
        $post = request('post');
        $file = file_get_contents($post);

        $url = '/storage/images/' . Storage::disk('images')->put('', $file);

        $newPost = InstagramPost::create([
            'user_id' => "50365563511",
            'image_url' => $url,
            'verified' => true
        ]);

        activity()
            ->performedOn($newPost)
            ->causedBy(auth()->user())
            ->log('Instagram Post Added by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Imagem Adicionada!');
    }

    public function create()
    {
        request()->validate([
            'content' => ['required', 'max:80000'],
        ]);

        $file = request()->file('content');

        $url = '/storage/images/' . Storage::disk('images')->put('', $file);


        $newPost = InstagramPost::create([
            'user_id' => auth()->user()->getAuthIdentifier(),
            'image_url' => $url,
            'verified' => true
        ]);

        activity()
            ->performedOn($newPost)
            ->causedBy(auth()->user())
            ->log('Instagram Post Created by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Imagem Adicionada!');
    }

    /**
        Update Verified Status and delete file
     */
    public function destroy(InstagramPost $instagramPost)
    {
        if(Storage::exists($instagramPost->image_url)){
            Storage::delete($instagramPost->image_url);
        }

        $instagramPost->delete();

        activity()
            ->performedOn($instagramPost)
            ->causedBy(auth()->user())
            ->log('Instagram Post Deleted by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Imagem Removida!');
    }
}
