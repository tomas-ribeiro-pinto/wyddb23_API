<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\View\View;

class ContactController
{
    public function index(): View
    {
        $contacts = Contact::all();

        return view('contacts.index', compact("contacts"));
    }

    public function create(): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'person' => ['required', 'max:40'],
            'contact' => ['required', 'max:25'],
            'description_pt' => ['max:3000'],
            'description_en' => ['max:3000'],
            'description_es' => ['max:3000'],
            'description_it' => ['max:3000'],
        ]);

        $contact = Contact::create([
            'person' => request('person'),
            'contact' => request('contact'),
            'description_pt' => request('description_pt'),
            'description_en' => request('description_en'),
            'description_es' => request('description_es'),
            'description_it' => request('description_it'),
        ]);

        $contact->save();

        activity()
            ->performedOn($contact)
            ->causedBy(auth()->user())
            ->log('Contact Added by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo adicionado!');
    }

    public function update(): \Illuminate\Http\RedirectResponse
    {
        $contact = Contact::find(request('id'));
        $attributes = request()->validate([
            'person' => ['required', 'max:40'],
            'contact' => ['required', 'max:25'],
            'description_pt' => ['max:3000'],
            'description_en' => ['max:3000'],
            'description_es' => ['max:3000'],
            'description_it' => ['max:3000'],
        ]);

            $attributes['description_pt'] ?? $contact->description_pt = null;
            $attributes['description_en'] ?? $contact->description_en = null;
            $attributes['description_es'] ?? $contact->description_es = null;
            $attributes['description_it'] ?? $contact->description_it = null;

        $contact->update($attributes);

        activity()
            ->performedOn($contact)
            ->causedBy(auth()->user())
            ->log('Contact Updated by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo Modificado!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if (request('id')) {
            $contact = Contact::find(request('id'));
            $contact->delete();
        }

        activity()
            ->performedOn($contact)
            ->causedBy(auth()->user())
            ->log('Contact Deleted by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo removido!');
    }
}