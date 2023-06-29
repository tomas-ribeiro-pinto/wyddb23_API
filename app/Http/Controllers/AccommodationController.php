<?php

namespace App\Http\Controllers;

use App\Models\AccommodationLocation;
use App\Models\Day;
use App\Models\EntryDay;
use Carbon\Carbon;
use Dotenv\Parser\Entry;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class AccommodationController extends Controller
{
    public function index(): View
    {
        $locations = ['cascais', 'estoril', 'lisboa', 'manique', 'setúbal'];

        return view('accommodation.index', compact("locations"));
    }

    public function show(String $location): View
    {
        $accommodationLocations = AccommodationLocation::where('location', $location)->get();

        return view('accommodation.show', compact("accommodationLocations", "location"));
    }

    public function create(): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'name' => ['required', 'max:40'],
            'location' => ['required'],
            'address_line1' => ['required', 'max:25'],
            'address_line2' => ['required', 'max:25'],
            'contact' => ['required', 'max:25'],
            'picture' => ['required', 'max:250'],
            'description_pt' => ['max:3000'],
            'description_en' => ['max:3000'],
        ]);

        $accommodation = AccommodationLocation::create([
            'name' => request('name'),
            'location' => request('location'),
            'address_line1' => request('address_line1'),
            'address_line2' => request('address_line2'),
            'contact' => request('contact'),
            'picture' => request('picture'),
            'description_pt' => request('description_pt'),
            'description_en' => request('description_en'),
        ]);

        $accommodation->save();

        activity()
            ->performedOn($accommodation)
            ->causedBy(auth()->user())
            ->log('Accommodation Added by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo adicionado!');
    }

    public function update(): \Illuminate\Http\RedirectResponse
    {
        $accommodation = AccommodationLocation::find(request('id'));
        $attributes = request()->validate([
            'name' => ['required', 'max:40'],
            'location' => ['required'],
            'address_line1' => ['required', 'max:25'],
            'address_line2' => ['required', 'max:25'],
            'contact' => ['required', 'max:25'],
            'picture' => ['required', 'max:250'],
            'description_pt' => ['max:3000'],
            'description_en' => ['max:3000'],
        ]);

        $attributes['description_pt'] ?? $accommodation->description_pt = null;
        $attributes['description_en'] ?? $accommodation->description_en = null;

        $accommodation->update($attributes);

        activity()
            ->performedOn($accommodation)
            ->causedBy(auth()->user())
            ->log('Accommodation Updated by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo Modificado!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if(request('accommodationLocation'))
        {
            $accommodationLocation = AccommodationLocation::find(request('accommodationLocation'));
            $accommodationLocation->delete();
        }

        activity()
            ->performedOn($accommodationLocation)
            ->causedBy(auth()->user())
            ->log('Accommodation Deleted by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo removido!');
    }
}
