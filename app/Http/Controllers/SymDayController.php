<?php

namespace App\Http\Controllers;

use App\Models\Emergency;
use App\Models\Forum;
use App\Models\Map;
use App\Models\StreamingLink;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SymDayController extends Controller
{
    public function index(): View
    {
        $map = Map::all()->first();
        $sym_forum = StreamingLink::where('name', 'sym-forum')->first();
        $live_streaming = StreamingLink::where('name', 'live-streaming')->first();
        $emergency = Emergency::all()->first();

        if($emergency == null)
        {
            $emergency = new Emergency([
                'title_pt' => '',
                'title_en' => '',
                'title_es' => '',
                'title_it' => '',
                'body_pt' => '',
                'body_en' => '',
                'body_es' => '',
                'body_it' => '',
            ]);
        }

        $forum = Forum::all()->first();

        if($forum == null)
        {
            $forum = new Forum([
                'title_pt' => '',
                'title_en' => '',
                'title_es' => '',
                'title_it' => '',
                'body_pt' => '',
                'body_en' => '',
                'body_es' => '',
                'body_it' => '',
            ]);
        }

        return view('symday-content', compact("map", "live_streaming", "forum", "emergency"));
    }

    public function storeMap(): RedirectResponse
    {
        request()->validate([
            'pdf_pt' => ['mimes:pdf'],
            'pdf_en' => ['mimes:pdf'],
            'pdf_es' => ['mimes:pdf'],
            'pdf_it' => ['mimes:pdf'],
        ]);

        $url_pt = null;
        $url_en = null;
        $url_es = null;
        $url_it = null;

        if(request('pdf_pt') != null)
        {
            $file_pt = request()->file('pdf_pt');
            $url_pt = Storage::disk('public')->put("attachments", $file_pt);
        }

        if(request('pdf_en') != null) {
            $file_en = request()->file('pdf_en');
            $url_en = Storage::disk('public')->put("attachments", $file_en);
        }

        if(request('pdf_es') != null) {
            $file_es = request()->file('pdf_es');
            $url_es = Storage::disk('public')->put("attachments", $file_es);
        }

        if(request('pdf_it') != null) {
            $file_it = request()->file('pdf_it');
            $url_it = Storage::disk('public')->put("attachments", $file_it);
        }


        $map = Map::all()->first();
        if($map != null)
        {
            if($url_pt)
                $map->url_pt = $url_pt;
            if($url_en)
                $map->url_en = $url_en;
            if($url_es)
                $map->url_es = $url_es;
            if($url_it)
                $map->url_it = $url_it;

            $map->update();
        }
        {
            $map = Map::create([
                'url_pt' => $url_pt,
                'url_en' => $url_en,
                'url_es' => $url_es,
                'url_it' => $url_it,
            ]);
            $map->save();
        }

        activity()
            ->performedOn($map)
            ->causedBy(auth()->user())
            ->log('Map Updated by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Mapa adicionado!');
    }

    public function storeSymForum(): RedirectResponse
    {
        $attributes = request()->validate([
            'title_pt' => ['required', 'max:15'],
            'title_en' => ['required', 'max:15'],
            'title_es' => ['required', 'max:15'],
            'title_it' => ['required', 'max:15'],
            'body_pt' => ['required'],
            'body_en' => ['required'],
            'body_es' => ['required'],
            'body_it' => ['required'],
        ]);

        $forum = Forum::all()->first();

        if ($forum != null) {
            $forum->update($attributes);
        } else {
            $forum = Forum::create([
                'title_pt' => request('title_pt'),
                'title_en' => request('title_en'),
                'title_es' => request('title_es'),
                'title_it' => request('title_it'),
                'body_pt' => request('body_pt'),
                'body_en' => request('body_en'),
                'body_es' => request('body_es'),
                'body_it' => request('body_it'),
            ]);

            $forum->save();
        }

        activity()
            ->performedOn($forum)
            ->causedBy(auth()->user())
            ->log('SYM Forum Updated by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo Modificado!');
    }

    public function storeLiveStreaming(): RedirectResponse
    {
        request()->validate([
            'url' => ['required'],
        ]);

        $live_streaming = StreamingLink::where('name', 'live-streaming')->first();

        if($live_streaming != null)
        {
            $live_streaming->url = request('url');
            $live_streaming->update();
        }
        {
            $live_streaming = StreamingLink::create([
                'name' => 'live-streaming',
                'url' => request('url'),
            ]);
            $live_streaming->save();
        }

        activity()
            ->performedOn($live_streaming)
            ->causedBy(auth()->user())
            ->log('Live Streaming Link Updated by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Link adicionado!');
    }

    public function storeEmergency(): RedirectResponse
    {
        $attributes = request()->validate([
            'title_pt' => ['required', 'max:15'],
            'title_en' => ['required', 'max:15'],
            'title_es' => ['required', 'max:15'],
            'title_it' => ['required', 'max:15'],
            'body_pt' => ['required'],
            'body_en' => ['required'],
            'body_es' => ['required'],
            'body_it' => ['required'],
        ]);

        $emergency = Emergency::all()->first();

        if($emergency != null)
        {
            $emergency->update($attributes);
        }
        else
        {
            $emergency = Emergency::create([
                'title_pt' => request('title_pt'),
                'title_en' => request('title_en'),
                'title_es' => request('title_es'),
                'title_it' => request('title_it'),
                'body_pt' => request('body_pt'),
                'body_en' => request('body_en'),
                'body_es' => request('body_es'),
                'body_it' => request('body_it'),
            ]);

            $emergency->save();
        }

        activity()
            ->performedOn($emergency)
            ->causedBy(auth()->user())
            ->log('Emergency Updated by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo Modificado!');
    }
}
