<?php

namespace App\Http\Controllers;

use App\Models\CacheEraser;
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

    // Erase APP's Cache by updating date
    public function eraseCache()
    {
        $cache = CacheEraser::all()->first();

        $cache->updated_at = now();

        $cache->update();

        return back()->with('message', 'Cache Limpa!');
    }
}
