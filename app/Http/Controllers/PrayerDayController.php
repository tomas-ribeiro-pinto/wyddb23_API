<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\PrayerDay;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PrayerDayController extends Controller
{
    public function index(): View
    {
        $days = Day::all()->sortBy('day');

        return view('prayers.index', compact("days"));
    }

    public function show(Day $day): View
    {
        $prayerDays = PrayerDay::where('day_id', $day->id)->orderBy('order_index')->get();
        $order = PrayerDay::all()->count() == null ? 1 : PrayerDay::all()->count() + 1;

        return view('prayers.show', compact("prayerDays", "order", "day"));
    }

    public function create(): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'day' => ['required'],
            'order' => ['required'],
            'title_pt' => ['required', 'max:15'],
            'title_en' => ['required', 'max:15'],
            'title_es' => ['required', 'max:15'],
            'title_it' => ['required', 'max:15'],
            'body_pt' => ['required'],
            'body_en' => ['required'],
            'body_es' => ['required'],
            'body_it' => ['required'],
        ]);

        $entry = PrayerDay::create([
            'day_id' => request('day'),
            'order_index' => request('order'),
            'title_pt' => request('title_pt'),
            'title_en' => request('title_en'),
            'title_es' => request('title_es'),
            'title_it' => request('title_it'),
            'body_pt' => request('body_pt'),
            'body_en' => request('body_en'),
            'body_es' => request('body_es'),
            'body_it' => request('body_it'),
        ]);

        $entry->save();

        activity()
            ->performedOn($entry)
            ->causedBy(auth()->user())
            ->log('Prayer Entry Added by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo adicionado!');
    }

    public function update(): \Illuminate\Http\RedirectResponse
    {
        $prayerDay = PrayerDay::find(request('id'));
        $attributes = request()->validate([
            'day_id' => ['required'],
            'order_index' => ['required'],
            'title_pt' => ['required', 'max:15'],
            'title_en' => ['required', 'max:15'],
            'title_es' => ['required', 'max:15'],
            'title_it' => ['required', 'max:15'],
            'body_pt' => ['required'],
            'body_en' => ['required'],
            'body_es' => ['required'],
            'body_it' => ['required'],
        ]);

        $prayerDay->update($attributes);

        activity()
            ->performedOn($prayerDay)
            ->causedBy(auth()->user())
            ->log('Prayer Entry Updated by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo Modificado!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if(request('id'))
        {
            $prayerDay = PrayerDay::find(request('id'));
            $prayerDay->delete();
        }

        activity()
            ->performedOn($prayerDay)
            ->causedBy(auth()->user())
            ->log('Prayer Entry Deleted by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo removido!');
    }
}
