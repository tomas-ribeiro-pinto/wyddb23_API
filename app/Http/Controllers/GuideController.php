<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuideController extends Controller
{
    public function index()
    {
        $guides = Guide::all();

        return view('symday.guides.index', compact("guides"));
    }

    public function create(): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'title_pt' => ['required', 'max:25'],
            'title_en' => ['required', 'max:25'],
            'title_es' => ['required', 'max:25'],
            'title_it' => ['required', 'max:25'],
            'pdf' => ['required', 'mimes:pdf'],
        ]);

        $file = request()->file('pdf');

        $url = Storage::disk('public')->put("guides", $file);

        $guide = Guide::create([
            'title_pt' => request('title_pt'),
            'title_en' => request('title_en'),
            'title_es' => request('title_es'),
            'title_it' => request('title_it'),
            'asset_url' => $url,
        ]);

        $guide->save();

        activity()
            ->performedOn($guide)
            ->causedBy(auth()->user())
            ->log('Guide Added by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo adicionado!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {

        if(request('id'))
        {
            $guide = Guide::find(request('id'));
            Storage::disk('public')->delete($guide->asset_url);
            $guide->delete();
        }

        activity()
            ->performedOn($guide)
            ->causedBy(auth()->user())
            ->log('Guide Deleted by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo removido!');
    }
}
