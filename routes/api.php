<?php

use App\Models\Day;
use App\Models\EntryDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/agenda', function () {
    return Day::with('entries')->get();
});

Route::get('/accommodation', function () {
    return \App\Models\AccommodationLocation::all();
});

Route::get('/accommodation/{location}', function (String $location) {
    return \App\Models\AccommodationLocation::where('location', $location)->get();
});

Route::get('/visit', function () {
    return \App\Models\VisitLocation::all();
});
