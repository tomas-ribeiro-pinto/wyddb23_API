<?php

namespace App\Http\Controllers;

use App\Models\FatimaGuide;
use App\Models\NewFatimaGuide;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FatimaGuideController extends Controller
{
    public function index(): View
    {
        $guides = NewFatimaGuide::all();

        return view('fatima.guides.new-index', compact("guides"));
    }

    public function create(): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'title_pt' => ['required', 'max:25'],
            'title_en' => ['required', 'max:25'],
            'title_es' => ['required', 'max:25'],
            'title_it' => ['required', 'max:25'],
            'body_pt' => ['required'],
            'body_en' => ['required'],
            'body_es' => ['required'],
            'body_it' => ['required'],
        ]);

        $guide = NewFatimaGuide::create([
            'title_pt' => request('title_pt'),
            'title_en' => request('title_en'),
            'title_es' => request('title_es'),
            'title_it' => request('title_it'),
            'body_pt' => request('body_pt'),
            'body_en' => request('body_en'),
            'body_es' => request('body_es'),
            'body_it' => request('body_it'),
        ]);

        $guide->save();

        activity()
            ->performedOn($guide)
            ->causedBy(auth()->user())
            ->log('NFatima Guide Added by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo adicionado!');
    }

    public function update(): \Illuminate\Http\RedirectResponse
    {
        $guide = NewFatimaGuide::find(request('id'));
        $attributes = request()->validate([
            'title_pt' => ['required', 'max:25'],
            'title_en' => ['required', 'max:25'],
            'title_es' => ['required', 'max:25'],
            'title_it' => ['required', 'max:25'],
            'body_pt' => ['required'],
            'body_en' => ['required'],
            'body_es' => ['required'],
            'body_it' => ['required'],
        ]);

        $guide->update($attributes);

        activity()
            ->performedOn($guide)
            ->causedBy(auth()->user())
            ->log('NFatima Guide Updated by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo Modificado!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if(request('id'))
        {
            $guide = NewFatimaGuide::find(request('id'));
            $guide->delete();
        }

        activity()
            ->performedOn($guide)
            ->causedBy(auth()->user())
            ->log('NFatima Guide Deleted by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo removido!');
    }

    public function attach() {
        request()->validate([
            'attachment' => ['required', 'file'],
        ]);

        $path = request()->file('attachment')->store('attachments', 'public');

        return [
            'image_url' => Storage::disk('public')->url($path),
        ];
    }
//    public function index()
//    {
//        $guides = FatimaGuide::all();
//
//        return view('fatima.guides.index', compact("guides"));
//    }
//
//    public function create(): \Illuminate\Http\RedirectResponse
//    {
//        request()->validate([
//            'title_pt' => ['required', 'max:25'],
//            'title_en' => ['required', 'max:25'],
//            'title_es' => ['required', 'max:25'],
//            'title_it' => ['required', 'max:25'],
//            'pdf' => ['required', 'mimes:pdf'],
//        ]);
//
//        $file = request()->file('pdf');
//
//        $url = Storage::disk('public')->put("guides", $file);
//
//        $guide = FatimaGuide::create([
//            'title_pt' => request('title_pt'),
//            'title_en' => request('title_en'),
//            'title_es' => request('title_es'),
//            'title_it' => request('title_it'),
//            'asset_url' => $url,
//        ]);
//
//        $guide->save();
//
//        activity()
//            ->performedOn($guide)
//            ->causedBy(auth()->user())
//            ->log('Fatima Guide Added by ' . auth()->user()->name . ' at ' . now());
//
//        return back()->with('message', 'Registo adicionado!');
//    }
//
//    public function destroy(): \Illuminate\Http\RedirectResponse
//    {
//
//        if(request('id'))
//        {
//            $guide = FatimaGuide::find(request('id'));
//            Storage::disk('public')->delete($guide->asset_url);
//            $guide->delete();
//        }
//
//        activity()
//            ->performedOn($guide)
//            ->causedBy(auth()->user())
//            ->log('Fatima Guide Deleted by ' . auth()->user()->name . ' at ' . now());
//
//        return back()->with('message', 'Registo removido!');
//    }
}
