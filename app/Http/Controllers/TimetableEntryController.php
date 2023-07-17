<?php

namespace App\Http\Controllers;

use App\Models\TimetableEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TimetableEntryController extends Controller
{
    public function index(): View
    {
        $entrys = TimetableEntry::all()->sortBy('start_time');

        return view('symday.timetable.index', compact("entrys"));
    }

    public function create(): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'title_pt' => ['required', 'max:25'],
            'title_en' => ['required', 'max:25'],
            'title_es' => ['required', 'max:25'],
            'title_it' => ['required', 'max:25'],
            'description_pt' => ['max:3000'],
            'description_en' => ['max:3000'],
            'description_es' => ['max:3000'],
            'description_it' => ['max:3000'],
            'location' => ['required', 'max:300'],
        ]);

        $entry = TimetableEntry::create([
            'title_pt' => request('title_pt'),
            'title_en' => request('title_en'),
            'title_es' => request('title_es'),
            'title_it' => request('title_it'),
            'description_pt' => request('description_pt'),
            'description_en' => request('description_en'),
            'description_es' => request('description_es'),
            'description_it' => request('description_it'),
            'location' => request('location'),
            'start_time' => request('start_time')
                ? Carbon::parse('2023-08-02' . ' ' . request('start_time'))
                : null,
            'end_time' => request('end_time')
                ? Carbon::parse('2023-08-02' . ' ' . request('end_time'))
                : null,
        ]);

        $entry->save();

        activity()
            ->performedOn($entry)
            ->causedBy(auth()->user())
            ->log('Timetable Entry Added by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo adicionado!');
    }

    public function update(): \Illuminate\Http\RedirectResponse
    {
        $entry = TimetableEntry::find(request('id'));
        $attributes = request()->validate([
            'title_pt' => ['required', 'max:25'],
            'title_en' => ['required', 'max:25'],
            'title_es' => ['required', 'max:25'],
            'title_it' => ['required', 'max:25'],
            'description_pt' => ['max:3000'],
            'description_en' => ['max:3000'],
            'description_es' => ['max:3000'],
            'description_it' => ['max:3000'],
            'location' => ['required', 'max:300'],
        ]);

        $attributes['start_time'] = request('start_time')
            ? Carbon::parse('2023-08-02' . ' ' . request('start_time'))
            : null;
        $attributes['end_time'] = request('end_time')
            ? Carbon::parse('2023-08-02' . ' ' . request('end_time'))
            : null;

            $attributes['description_pt'] ?? $entry->description_pt = null;
            $attributes['description_en'] ?? $entry->description_en = null;
            $attributes['description_es'] ?? $entry->description_es = null;
            $attributes['description_it'] ?? $entry->description_it = null;

        $entry->update($attributes);

        activity()
            ->performedOn($entry)
            ->causedBy(auth()->user())
            ->log('Timetable Entry Updated by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo Modificado!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if(request('id'))
        {
            $entry = TimetableEntry::find(request('id'));
            $entry->delete();
        }

        activity()
            ->performedOn($entry)
            ->causedBy(auth()->user())
            ->log('Timetable Entry Deleted by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo removido!');
    }
}
