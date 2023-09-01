<?php

namespace App\Http\Controllers;

use App\Models\FatimaVisit;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FatimaVisitController extends Controller
{
    public function index(): View
    {
        $visits = FatimaVisit::all();

        return view('fatima.visits.index', compact("visits"));
    }

    public function create(): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'name' => ['required', 'max:40'],
            'address_line1' => ['required', 'max:25'],
            'address_line2' => ['required', 'max:25'],
            'picture' => ['required', 'max:250'],
            'description_pt' => ['max:5000'],
            'description_en' => ['max:5000'],
            'description_es' => ['max:5000'],
            'description_it' => ['max:5000'],
        ]);

        $visit = FatimaVisit::create([
            'name' => request('name'),
            'address_line1' => request('address_line1'),
            'address_line2' => request('address_line2'),
            'picture' => request('picture'),
            'description_pt' => request('description_pt'),
            'description_en' => request('description_en'),
            'description_es' => request('description_es'),
            'description_it' => request('description_it'),
        ]);

        $visit->save();

        activity()
            ->performedOn($visit)
            ->causedBy(auth()->user())
            ->log('Fatima Visit Added by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo adicionado!');
    }

    public function update(): \Illuminate\Http\RedirectResponse
    {
        $visit = FatimaVisit::find(request('id'));
        $attributes = request()->validate([
            'name' => ['required', 'max:40'],
            'address_line1' => ['required', 'max:25'],
            'address_line2' => ['required', 'max:25'],
            'picture' => ['required', 'max:250'],
            'description_pt' => ['max:5000'],
            'description_en' => ['max:5000'],
            'description_es' => ['max:5000'],
            'description_it' => ['max:5000'],
        ]);

        $attributes['description_pt'] ?? $visit->description_pt = null;
        $attributes['description_en'] ?? $visit->description_en = null;
        $attributes['description_es'] ?? $visit->description_es = null;
        $attributes['description_it'] ?? $visit->description_it = null;

        $visit->update($attributes);

        activity()
            ->performedOn($visit)
            ->causedBy(auth()->user())
            ->log('Fatima Visit Updated by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo Modificado!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if(request('id'))
        {
            $visit = FatimaVisit::find(request('id'));
            $visit->delete();
        }

        activity()
            ->performedOn($visit)
            ->causedBy(auth()->user())
            ->log('Fatima Visit Deleted by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo removido!');
    }
}
