<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FatimaController extends Controller
{
    public function index(): View
    {
        return view('fatima-content');
    }
}
