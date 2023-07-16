<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\StoryGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoriesController extends Controller
{
    public function index() {
        $storyGroups = StoryGroup::all();
        return view('story-groups', compact("storyGroups"));
    }

    public function edit(StoryGroup $storyGroup)
    {
        $stories = $storyGroup->stories;
        return view('stories.index', compact("storyGroup", "stories"));
    }

    public function addGroup(): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'image' => ['required', 'mimes:png,jpg'],
            'title' => ['required', 'max:15'],
        ]);

        $file = request()->file('image');

        $url = Storage::disk('public')->put('images', $file);

        $group = StoryGroup::create([
            'image_url' => $url,
            'title' => request('title')
        ]);

        $group->save();

        activity()
            ->performedOn($group)
            ->causedBy(auth()->user())
            ->log('Story Group Added by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo adicionada!');
    }

    public function create(): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'content' => ['required', 'max:80000'],
            'group' => ['required'],
        ]);

        $storyGroup = StoryGroup::find(request('group'));

        $file = request()->file('content');

        $url = Storage::disk('public')->put('images', $file);

        $story = Story::create([
            'content_url' => $url,
            'story_group_id' => $storyGroup->id
        ]);

        if($file->extension() == 'mp4')
            $story->is_video = true;

        $story->save();

        activity()
            ->performedOn($story)
            ->causedBy(auth()->user())
            ->log('Story Added by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'História adicionada!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if(request('id'))
        {
            $story = Story::find(request('id'));
            $story->delete();
        }

        activity()
            ->performedOn($story)
            ->causedBy(auth()->user())
            ->log('Story Deleted by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'História removida!');
    }

    public function deleteGroup(): \Illuminate\Http\RedirectResponse
    {
        if(request('id'))
        {
            $group = StoryGroup::find(request('id'));
            $group->delete();
        }

        activity()
            ->performedOn($group)
            ->causedBy(auth()->user())
            ->log('Story Group Deleted by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo removido!');
    }
}
