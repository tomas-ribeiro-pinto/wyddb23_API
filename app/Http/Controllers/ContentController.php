<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(): View
    {
        return view('content');
    }

    public function symday(): View
    {
        return view('symday-content');
    }
}
