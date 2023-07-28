<?php

namespace App\Http\Controllers;

use App\Models\NewVisit;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewVisitController extends Controller
{
    public function index(): View
    {
        $locations = ['lisboa', 'cascais', 'setúbal'];

        return view('new-visits.index', compact("locations"));
    }
    public function show(String $location): View
    {
        $visits = NewVisit::all()->where('city', $location);

        return view('new-visits.show', compact("visits", "location"));
    }

    public function create(): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'city' => ['required'],
            'name' => ['required', 'max:40'],
            'address_line1' => ['required', 'max:25'],
            'address_line2' => ['required', 'max:25'],
            'picture' => ['required', 'max:250'],
            'description_pt' => ['max:3000'],
            'description_en' => ['max:3000'],
            'description_es' => ['max:3000'],
            'description_it' => ['max:3000'],
        ]);

        $visit = NewVisit::create([
            'city' => request('city'),
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
            ->log('NVisit Added by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo adicionado!');
    }

    public function update(): \Illuminate\Http\RedirectResponse
    {
        $visit = NewVisit::find(request('id'));
        $attributes = request()->validate([
            'name' => ['required', 'max:40'],
            'address_line1' => ['required', 'max:25'],
            'address_line2' => ['required', 'max:25'],
            'picture' => ['required', 'max:250'],
            'description_pt' => ['max:3000'],
            'description_en' => ['max:3000'],
            'description_es' => ['max:3000'],
            'description_it' => ['max:3000'],
        ]);

            $attributes['description_pt'] ?? $visit->description_pt = null;
            $attributes['description_en'] ?? $visit->description_en = null;
            $attributes['description_es'] ?? $visit->description_es = null;
            $attributes['description_it'] ?? $visit->description_it = null;

        $visit->update($attributes);

        activity()
            ->performedOn($visit)
            ->causedBy(auth()->user())
            ->log('NVisit Updated by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo Modificado!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if(request('id'))
        {
            $visit = NewVisit::find(request('id'));
            $visit->delete();
        }

        activity()
            ->performedOn($visit)
            ->causedBy(auth()->user())
            ->log('NVisit Deleted by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo removido!');
    }
}
