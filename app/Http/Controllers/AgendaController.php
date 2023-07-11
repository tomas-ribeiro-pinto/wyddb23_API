<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\EntryDay;
use Carbon\Carbon;
use Dotenv\Parser\Entry;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index(): View
    {
        $days = Day::all()->sortBy('day');

        return view('edit-agenda', compact("days"));
    }

    public function show(Day $day): View
    {
        $entryDays = EntryDay::where('day_id', $day->id)->orderBy('start_time')->get();

        return view('day-agenda', compact("entryDays", "day"));
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

        $entry = EntryDay::create([
            'day_id' => request('day'),
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
                ? Carbon::parse(Day::find(request('day'))->day . ' ' . request('start_time'))
                : null,
            'end_time' => request('end_time')
                ? Carbon::parse(Day::find(request('day'))->day . ' ' . request('end_time'))
                : null,
        ]);

        $entry->save();

        activity()
            ->performedOn($entry)
            ->causedBy(auth()->user())
            ->log('Entry Added by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo adicionado!');
    }

    public function update(): \Illuminate\Http\RedirectResponse
    {
        $entryDay = EntryDay::find(request('id'));
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
            ? Carbon::parse(Day::find(request('day'))->day . ' ' . request('start_time'))
            : null;
        $attributes['end_time'] = request('end_time')
            ? Carbon::parse(Day::find(request('day'))->day . ' ' . request('end_time'))
            : null;

        $attributes['description_pt'] ?? $entryDay->description_pt = null;
        $attributes['description_en'] ?? $entryDay->description_en = null;
        $attributes['description_es'] ?? $entryDay->description_es = null;
        $attributes['description_it'] ?? $entryDay->description_it = null;

        $entryDay->update($attributes);

        activity()
            ->performedOn($entryDay)
            ->causedBy(auth()->user())
            ->log('Entry Updated by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo Modificado!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if(request('id'))
        {
            $entryDay = EntryDay::find(request('id'));
            $entryDay->delete();
        }

        activity()
            ->performedOn($entryDay)
            ->causedBy(auth()->user())
            ->log('Entry Deleted by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo removido!');
    }
}
