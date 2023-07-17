<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ContentController extends Controller
{
    public function index(): View
    {
        return view('content');
    }
}
