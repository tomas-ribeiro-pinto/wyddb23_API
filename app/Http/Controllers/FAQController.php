<?php

namespace App\Http\Controllers;

use App\Models\faq;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index(): View
    {
        $faqs = faq::all();

        return view('faqs.index', compact("faqs"));
    }

    public function create(): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'question_pt' => ['required', 'max:100'],
            'question_en' => ['required', 'max:100'],
            'question_es' => ['required', 'max:100'],
            'question_it' => ['required', 'max:100'],
            'answer_pt' => ['required', 'max:3000'],
            'answer_en' => ['required', 'max:3000'],
            'answer_es' => ['required', 'max:3000'],
            'answer_it' => ['required', 'max:3000'],
        ]);

        $faq = faq::create([
            'question_pt' => request('question_pt'),
            'question_en' => request('question_en'),
            'question_es' => request('question_es'),
            'question_it' => request('question_it'),
            'answer_pt' => request('answer_pt'),
            'answer_en' => request('answer_en'),
            'answer_es' => request('answer_es'),
            'answer_it' => request('answer_it'),
        ]);

        $faq->save();

        activity()
            ->performedOn($faq)
            ->causedBy(auth()->user())
            ->log('faq Added by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo adicionado!');
    }

    public function update(): \Illuminate\Http\RedirectResponse
    {
        $faq = faq::find(request('id'));
        $attributes = request()->validate([
            'question_pt' => ['required', 'max:100'],
            'question_en' => ['required', 'max:100'],
            'question_es' => ['required', 'max:100'],
            'question_it' => ['required', 'max:100'],
            'answer_pt' => ['required', 'max:3000'],
            'answer_en' => ['required', 'max:3000'],
            'answer_es' => ['required', 'max:3000'],
            'answer_it' => ['required', 'max:3000'],
        ]);

        $faq->update($attributes);

        activity()
            ->performedOn($faq)
            ->causedBy(auth()->user())
            ->log('faq Updated by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo Modificado!');
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        if(request('id'))
        {
            $faq = faq::find(request('id'));
            $faq->delete();
        }

        activity()
            ->performedOn($faq)
            ->causedBy(auth()->user())
            ->log('faq Deleted by ' . auth()->user()->name . ' at ' . now());

        return back()->with('message', 'Registo removido!');
    }
}
