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
        $days = Day::all();

        return view('edit-agenda', compact("days"));
    }

    public function show(Day $day): View
    {
        $entryDays = EntryDay::where('day_id', $day->id)->get();

        return view('day-agenda', compact("entryDays", "day"));
    }

    public function create(): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'title_pt' => ['required', 'max:25'],
            'title_en' => ['required', 'max:25'],
            'description_pt' => ['max:3000'],
            'description_en' => ['max:3000'],
            'location' => ['required', 'max:300'],
            'start_time' => ['required'],
            'end_time' => ['required'],
        ]);

        $entry = EntryDay::create([
            'day_id' => request('day'),
            'title_pt' => request('title_pt'),
            'title_en' => request('title_en'),
            'description_pt' => request('description_pt'),
            'description_en' => request('description_en'),
            'location' => request('location'),
            'start_time' => Carbon::parse(request('start_time')),
            'end_time' => Carbon::parse(request('end_time')),
        ]);

        $entry->save();

        return back()->with('message', 'Registo adicionado!');
    }

    public function update(): \Illuminate\Http\RedirectResponse
    {
        $entryDay = EntryDay::find(request('id'));
        $attributes = request()->validate([
            'title_pt' => ['required', 'max:25'],
            'title_en' => ['required', 'max:25'],
            'description_pt' => ['max:3000'],
            'description_en' => ['max:3000'],
            'location' => ['required', 'max:300'],
            'start_time' => ['required'],
            'end_time' => ['required'],
        ]);

        $attributes['start_time'] = Carbon::parse(request('start_time'));
        $attributes['end_time'] = Carbon::parse(request('end_time'));

        $attributes['description_pt'] ?? $entryDay->description_pt = null;
        $attributes['description_en'] ?? $entryDay->description_en = null;

        $entryDay->update($attributes);

        return back()->with('message', 'Registo Modificado!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if(request('entryDay'))
        {
            $entryDay = EntryDay::find(request('entryDay'));
            $entryDay->delete();
        }

        return back()->with('message', 'Registo removido!');
    }
}
