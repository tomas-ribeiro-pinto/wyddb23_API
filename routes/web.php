<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])
    ->name('dashboard');

// EDIT AGENDA
Route::get('/edit-agenda', [AgendaController::class, 'index'])->middleware(['auth', 'verified'])
    ->name('edit-agenda');

Route::get('/edit-agenda/{day}', [AgendaController::class, 'show'])->middleware(['auth', 'verified']);
Route::post('/edit-agenda/{day}', [AgendaController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::post('/edit-agenda/{day}/add', [AgendaController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/edit-agenda/{day}/update', [AgendaController::class, 'update'])->middleware(['auth', 'verified']);


// EDIT ACCOMMODATION LOCATIONS
Route::get('/edit-accommodation', [AccommodationController::class, 'index'])->middleware(['auth', 'verified'])
    ->name('edit-accommodation');

Route::get('/edit-accommodation/{location}', [AccommodationController::class, 'show'])->middleware(['auth', 'verified']);
Route::post('/edit-accommodation/{location}', [AccommodationController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::post('/edit-accommodation/{location}/add', [AccommodationController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/edit-accommodation/{location}/update', [AccommodationController::class, 'update'])->middleware(['auth', 'verified']);

// EDIT VISIT LOCATIONS
Route::get('/edit-visits', [VisitController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('edit-visits');
Route::post('/edit-visits', [VisitController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::post('/edit-visits/add', [VisitController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/edit-visits/update', [VisitController::class, 'update'])->middleware(['auth', 'verified']);

// EDIT CONTACTS
Route::get('/edit-contacts', [ContactController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('edit-contacts');
Route::post('/edit-contacts', [ContactController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::post('/edit-contacts/add', [ContactController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/edit-contacts/update', [ContactController::class, 'update'])->middleware(['auth', 'verified']);

// EDIT FAQs
Route::get('/edit-faqs', [FAQController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('edit-faqs');
Route::post('/edit-faqs', [FAQController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::post('/edit-faqs/add', [FAQController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/edit-faqs/update', [FAQController::class, 'update'])->middleware(['auth', 'verified']);

// EDIT INFORMATION
Route::get('/edit-information', [InformationController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('edit-information');
Route::post('/edit-information', [InformationController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::post('/edit-information/add', [InformationController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/edit-information/update', [InformationController::class, 'update'])->middleware(['auth', 'verified']);


Route::get('/content', [ContentController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('content');

Route::get('/notifications', function () {
    return view('notifications');
})->middleware(['auth', 'verified'])
    ->name('send-notification');

Route::get('/instagram', [InstagramController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('/posts', [InstagramController::class, 'show'])->middleware(['auth', 'verified'])->name('posts');
Route::post('/posts/validate/{instagramPost}', [InstagramController::class, 'update'])->middleware(['auth', 'verified']);
Route::post('/posts/delete/{instagramPost}', [InstagramController::class, 'destroy'])->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Create Link to storage
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

require __DIR__.'/auth.php';
