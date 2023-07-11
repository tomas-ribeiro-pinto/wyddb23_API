<?php

use App\Models\Day;
use App\Models\EntryDay;
use App\Models\Information;
use App\Models\InstagramPost;
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
    return Day::with('entries')->orderBy('day')->get();
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

Route::get('/contact', function () {
    return \App\Models\Contact::all();
});

Route::get('/faq', function () {
    return \App\Models\faq::all();
});

Route::get('/information', function () {

    $jsonArray = collect();

    $information_groups = Information::all();

    foreach ($information_groups as $information)
    {
        $addArray = array([
            "title_pt" => $information->title_pt,
            "title_en" => $information->title_en,
            "title_es" => $information->title_es,
            "title_it" => $information->title_it,
            "image_url" => $information->image_url,
            "body_pt" => $information->body_pt->render(),
            "body_en" => $information->body_en->render(),
            "body_es" => $information->body_es->render(),
            "body_it" => $information->body_it->render(),
        ]);
        $jsonArray->add($addArray);
    }

    return response()->json(
        $jsonArray,
    );
});

Route::get('/image', function () {

    $image = InstagramPost::where('verified', 1)->inRandomOrder()->limit(1)->get('image_url');

    return response()->json(
        $image,
        200,
        [],
        JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT
    );
});
