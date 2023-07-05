<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\InstagramPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class InstagramController extends Controller
{
    public function index()
    {
        $hashtag = "wyddonbosco23";
        $response = Http::get('https://www.instagram.com/explore/tags/' . $hashtag . '/?__a=1&__d=dis');

        if($response->ok())
        {
            $posts = json_decode($response)->graphql->hashtag->edge_hashtag_to_media->edges;
            $currentPosts = InstagramPost::select('id')->get();

            $tmp = 0;
            foreach ($posts as $post) if ($tmp < 10){
                if(!InstagramPost::find($post->node->id))
                {
                    Storage::disk('images')->put($post->node->id . '.jpg', file_get_contents($post->node->display_url));
                    InstagramPost::create([
                        'id' => $post->node->id,
                        'user_id' => $post->node->owner->id,
                        'image_url' => "/storage/images/" . $post->node->id . '.jpg',
                        'verified' => false
                    ]);
                    $tmp++;
                }
            }
            return redirect(route('posts'));
        }
        else
            Log::error('API response code: ' . $response->status());

        return abort($response->status());
    }

    public function show()
    {
        $posts = InstagramPost::where('verified', 0)->paginate(30);
        return view('posts', compact('posts'));
    }

    /**
        Update Verified Status
     */
    public function update(InstagramPost $instagramPost)
    {
        $instagramPost->verified = 1;
        $instagramPost->update();

        return back()->with('message', 'Imagem Validada!');
    }

    /**
        Update Verified Status and delete file
     */
    public function destroy(InstagramPost $instagramPost)
    {
        $instagramPost->verified = -1;
        $instagramPost->update();

        if(Storage::exists($instagramPost->image_url)){
            Storage::delete($instagramPost->image_url);
        }
        return back()->with('message', 'Imagem Removida!');
    }
}
