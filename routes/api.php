<?php

use App\Models\AccommodationLocation;
use App\Models\Day;
use App\Models\Emergency;
use App\Models\EntryDay;
use App\Models\Information;
use App\Models\InstagramPost;
use App\Models\Map;
use App\Models\NewGuide;
use App\Models\StoryGroup;
use App\Models\StreamingLink;
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
   $accommodations = AccommodationLocation::where('location', $location)->get();

    $jsonArray = collect();

    foreach ($accommodations as $accommodation)
    {
        $data = array([
            "name" => $accommodation->name,
            "location" => $accommodation->location,
            "address_line1" => $accommodation->address_line1,
            "address_line2" => $accommodation->address_line2,
            "contact" => $accommodation->contact,
            "picture" => $accommodation->picture,
            "body_pt" => $accommodation->description_pt->render(),
            "body_en" => $accommodation->description_en->render(),
            "body_es" => $accommodation->description_es->render(),
            "body_it" => $accommodation->description_it->render(),
            "create_at" => $accommodation->create_at,
            "updated_at" => $accommodation->updated_at,
        ]);
        $jsonArray->add($data);
    }

    return response()->json(
        $jsonArray,
    );
});

Route::get('/visit', function () {
    return \App\Models\VisitLocation::all();
});

Route::get('/fatima/visit', function () {
    return \App\Models\FatimaVisit::all();
});

Route::get('/contact', function () {
    return \App\Models\Contact::all();
});

Route::get('/faq', function () {
    return \App\Models\faq::all();
});

//Route::get('/guide', function () {
//    //return \App\Models\Guide::all();
//});

Route::get('/guide', function () {

    $jsonArray = collect();

    $guides = NewGuide::all();

    foreach ($guides as $guide)
    {
        $data = array([
            "title_pt" => $guide->title_pt,
            "title_en" => $guide->title_en,
            "title_es" => $guide->title_es,
            "title_it" => $guide->title_it,
            "body_pt" => $guide->body_pt->render(),
            "body_en" => $guide->body_en->render(),
            "body_es" => $guide->body_es->render(),
            "body_it" => $guide->body_it->render(),
        ]);
        $jsonArray->add($data);
    }

    return response()->json(
        $jsonArray,
    );
});

Route::get('/fatima/guide', function () {
    $jsonArray = collect();

    $guides = NewGuide::all();

    foreach ($guides as $guide)
    {
        $data = array([
            "title_pt" => $guide->title_pt,
            "title_en" => $guide->title_en,
            "title_es" => $guide->title_es,
            "title_it" => $guide->title_it,
            "body_pt" => $guide->body_pt->render(),
            "body_en" => $guide->body_en->render(),
            "body_es" => $guide->body_es->render(),
            "body_it" => $guide->body_it->render(),
        ]);
        $jsonArray->add($data);
    }

    return response()->json(
        $jsonArray,
    );
});

Route::get('/timetable', function () {
    return \App\Models\TimetableEntry::all();
});

Route::get('/story', function () {
    return StoryGroup::with('stories')->orderBy('created_at')->get();
});

Route::get('/information', function () {

    $jsonArray = collect();

    $information_groups = Information::all();

    foreach ($information_groups as $information)
    {
        $data = array([
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
        $jsonArray->add($data);
    }

    return $jsonArray;
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

Route::get('/map', function () {

    $map = Map::all()->sortBy('updated_at', SORT_DESC, true)->first();

    return response()->json(
        $map,
        200,
        [],
        JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT
    );
});

Route::get('/emergency', function () {
    return Emergency::all()->first();
});

Route::get('/sym-forum', function () {
    return StreamingLink::where('name', 'sym-forum')->first();
});

Route::get('/live-streaming', function () {
    return StreamingLink::where('name', 'live-streaming')->first();
});

Route::get('/prayer', function () {
    return Day::with('prayers')->orderBy('day')->get();
});