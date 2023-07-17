<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SymDayController extends Controller
{
    public function index(): View
    {
        $map = Map::all()->first();
        return view('symday-content', compact("map"));
    }

    public function store(): RedirectResponse
    {
        request()->validate([
            'pdf' => ['required', 'mimes:pdf'],
        ]);

        $file = request()->file('pdf');

        $url = Storage::disk('public')->put("attachments", $file);

        $map = Map::all()->first();
        if($map != null)
        {
            $map->url = $url;
            $map->update();
        }
        {
            $map = Map::create([
                'url' => $url,
            ]);
            $map->save();
        }

        activity()
            ->performedOn($map)
            ->causedBy(auth()->user())
            ->log('Map Updated by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Mapa adicionado!');
    }
}
