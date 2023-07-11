<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Information;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    public function index(): View
    {
        $information_groups = Information::all();

        return view('information.index', compact("information_groups"));
    }

    public function create(): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'title_pt' => ['required', 'max:15'],
            'title_en' => ['required', 'max:15'],
            'title_es' => ['required', 'max:15'],
            'title_it' => ['required', 'max:15'],
            'image_url' => ['required', 'max:250'],
            'body_pt' => ['required'],
            'body_en' => ['required'],
            'body_es' => ['required'],
            'body_it' => ['required'],
        ]);

        $information = Information::create([
            'title_pt' => request('title_pt'),
            'title_en' => request('title_en'),
            'title_es' => request('title_es'),
            'title_it' => request('title_it'),
            'image_url' => request('image_url'),
            'body_pt' => request('body_pt'),
            'body_en' => request('body_en'),
            'body_es' => request('body_es'),
            'body_it' => request('body_it'),
        ]);

        $information->save();

        activity()
            ->performedOn($information)
            ->causedBy(auth()->user())
            ->log('Information Added by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo adicionado!');
    }

    public function update(): \Illuminate\Http\RedirectResponse
    {
        $information = Information::find(request('id'));
        $attributes = request()->validate([
            'title_pt' => ['required', 'max:15'],
            'title_en' => ['required', 'max:15'],
            'title_es' => ['required', 'max:15'],
            'title_it' => ['required', 'max:15'],
            'image_url' => ['required', 'max:250'],
            'body_pt' => ['required'],
            'body_en' => ['required'],
            'body_es' => ['required'],
            'body_it' => ['required'],
        ]);

        $information->update($attributes);

        activity()
            ->performedOn($information)
            ->causedBy(auth()->user())
            ->log('Information Updated by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo Modificado!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if(request('id'))
        {
            $information = Information::find(request('id'));
            $information->delete();
        }

        activity()
            ->performedOn($information)
            ->causedBy(auth()->user())
            ->log('Information Deleted by ' . auth()->user()->name . ' at ' . now());

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
}
