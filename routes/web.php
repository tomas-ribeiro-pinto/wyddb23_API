<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FatimaController;
use App\Http\Controllers\FatimaGuideController;
use App\Http\Controllers\FatimaVisitController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\NewVisitController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PrayerDayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoriesController;
use App\Http\Controllers\SymDayController;
use App\Http\Controllers\TimetableEntryController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
Route::get('/edit-agenda', [AgendaController::class, 'index'])->middleware(['auth', 'verified', 'editor'])
    ->name('edit-agenda');

Route::get('/edit-agenda/{day}', [AgendaController::class, 'show'])->middleware(['auth', 'verified', 'editor']);
Route::post('/edit-agenda/{day}', [AgendaController::class, 'destroy'])->middleware(['auth', 'verified', 'editor']);

Route::post('/edit-agenda/{day}/add', [AgendaController::class, 'create'])->middleware(['auth', 'verified', 'editor']);
Route::post('/edit-agenda/{day}/update', [AgendaController::class, 'update'])->middleware(['auth', 'verified', 'editor']);


// EDIT ACCOMMODATION LOCATIONS
Route::get('/edit-accommodation', [AccommodationController::class, 'index'])->middleware(['auth', 'verified', 'editor'])
    ->name('edit-accommodation');

Route::get('/edit-accommodation/{location}', [AccommodationController::class, 'show'])->middleware(['auth', 'verified', 'editor']);
Route::post('/edit-accommodation/{location}', [AccommodationController::class, 'destroy'])->middleware(['auth', 'verified', 'editor']);

Route::post('/edit-accommodation/{location}/add', [AccommodationController::class, 'create'])->middleware(['auth', 'verified', 'editor']);
Route::post('/edit-accommodation/{location}/update', [AccommodationController::class, 'update'])->middleware(['auth', 'verified', 'editor']);

// EDIT VISIT LOCATIONS
Route::get('/edit-visits', [NewVisitController::class, 'index'])
    ->middleware(['auth', 'verified', 'editor'])
    ->name('edit-visits');
Route::get('/edit-visits/{location}', [NewVisitController::class, 'show'])->middleware(['auth', 'verified', 'editor']);
Route::post('/edit-visits/{location}', [NewVisitController::class, 'destroy'])->middleware(['auth', 'verified', 'editor']);

Route::post('/edit-visits/{location}/add', [NewVisitController::class, 'create'])->middleware(['auth', 'verified', 'editor']);
Route::post('/edit-visits/{location}/update', [NewVisitController::class, 'update'])->middleware(['auth', 'verified', 'editor']);

// EDIT FATIMA VISITS
Route::get('/fatima/edit-visits', [FatimaVisitController::class, 'index'])
    ->middleware(['auth', 'verified', 'editor'])
    ->name('edit-fatima-visits');
Route::post('/fatima/edit-visits', [FatimaVisitController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::post('/fatima/edit-visits/add', [FatimaVisitController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/fatima/edit-visits/update', [FatimaVisitController::class, 'update'])->middleware(['auth', 'verified']);

// EDIT CONTACTS
Route::get('/edit-contacts', [ContactController::class, 'index'])
    ->middleware(['auth', 'verified', 'editor'])
    ->name('edit-contacts');
Route::post('/edit-contacts', [ContactController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::post('/edit-contacts/add', [ContactController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/edit-contacts/update', [ContactController::class, 'update'])->middleware(['auth', 'verified']);

// EDIT FAQs
Route::get('/edit-faqs', [FAQController::class, 'index'])
    ->middleware(['auth', 'verified', 'editor'])
    ->name('edit-faqs');
Route::post('/edit-faqs', [FAQController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::post('/edit-faqs/add', [FAQController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/edit-faqs/update', [FAQController::class, 'update'])->middleware(['auth', 'verified']);

// EDIT GUIDES
Route::get('/edit-guides', [GuideController::class, 'index'])
    ->middleware(['auth', 'verified', 'editor'])
    ->name('edit-guides');
Route::post('/edit-guides/update', [GuideController::class, 'update'])->middleware(['auth', 'verified']);
Route::post('attachments', [GuideController::class, 'attach'])
    ->middleware(['auth', 'verified'])
    ->name('attachments.store');

Route::post('/edit-guides', [GuideController::class, 'destroy'])->middleware(['auth', 'verified']);
Route::post('/edit-guides/add', [GuideController::class, 'create'])->middleware(['auth', 'verified']);

// EDIT FATIMA GUIDES
Route::get('/fatima/edit-guides', [FatimaGuideController::class, 'index'])
    ->middleware(['auth', 'verified', 'editor'])
    ->name('edit-fatima-guides');
Route::post('/fatima/edit-guides/update', [GuideController::class, 'update'])->middleware(['auth', 'verified']);
Route::post('attachments', [GuideController::class, 'attach'])
    ->middleware(['auth', 'verified'])
    ->name('attachments.store');

Route::post('/fatima/edit-guides', [FatimaGuideController::class, 'destroy'])->middleware(['auth', 'verified']);
Route::post('/fatima/edit-guides/add', [FatimaGuideController::class, 'create'])->middleware(['auth', 'verified']);

// EDIT PRAYERS
Route::get('/edit-prayers', [PrayerDayController::class, 'index'])->middleware(['auth', 'verified', 'editor'])
    ->name('edit-prayers');

Route::get('/edit-prayers/{day}', [PrayerDayController::class, 'show'])->middleware(['auth', 'verified', 'editor']);
Route::post('/edit-prayers/{day}', [PrayerDayController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::post('/edit-prayers/{day}/add', [PrayerDayController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/edit-prayers/{day}/update', [PrayerDayController::class, 'update'])->middleware(['auth', 'verified']);

// EDIT TIMETABLE
Route::get('/symday/edit-timetable', [TimetableEntryController::class, 'index'])
    ->middleware(['auth', 'verified', 'editor'])
    ->name('edit-timetable');
Route::post('/symday/edit-timetable', [TimetableEntryController::class, 'destroy'])->middleware(['auth', 'verified', 'editor']);

Route::post('/symday/edit-timetable/add', [TimetableEntryController::class, 'create'])->middleware(['auth', 'verified', 'editor']);
Route::post('/symday/edit-timetable/update', [TimetableEntryController::class, 'update'])->middleware(['auth', 'verified', 'editor']);

// EDIT INFORMATION
Route::get('/edit-information', [InformationController::class, 'index'])
    ->middleware(['auth', 'verified', 'editor'])
    ->name('edit-information');
Route::post('/edit-information', [InformationController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::post('/edit-information/add', [InformationController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/edit-information/update', [InformationController::class, 'update'])->middleware(['auth', 'verified']);
Route::post('attachments', [InformationController::class, 'attach'])
    ->middleware(['auth', 'verified'])
    ->name('attachments.store');

// CONTENTS
Route::get('/content', [ContentController::class, 'index'])
    ->middleware(['auth', 'verified', 'editor'])
    ->name('content');
Route::post('/cache', [ContentController::class, 'eraseCache'])
    ->middleware(['auth', 'verified', 'admin']);

Route::get('/symday', [SymDayController::class, 'index'])
    ->middleware(['auth', 'verified', 'editor'])
    ->name('symday');

Route::post('/edit-map', [SymDayController::class, 'storeMap'])
    ->middleware(['auth', 'verified', 'editor']);
Route::post('/live-streaming/edit-link', [SymDayController::class, 'storeLiveStreaming'])
    ->middleware(['auth', 'verified', 'editor']);
Route::post('/edit-emergency', [SymDayController::class, 'storeEmergency'])
    ->middleware(['auth', 'verified', 'editor']);
Route::post('/edit-forum', [SymDayController::class, 'storeSymForum'])
    ->middleware(['auth', 'verified', 'editor']);

Route::get('/fatima', [FatimaController::class, 'index'])
    ->middleware(['auth', 'verified', 'editor'])
    ->name('fatima');


Route::get('/notifications', [NotificationController::class, 'index'])->middleware(['auth', 'verified', 'communicator'])
    ->name('send-notification');
Route::post('/notifications', [NotificationController::class, 'create'])->middleware(['auth', 'verified']);

Route::get('/story-group', [StoriesController::class, 'index'])->middleware(['auth', 'verified', 'media'])
    ->name('story-group');

Route::post('/story-group/add', [StoriesController::class, 'addGroup'])->middleware(['auth', 'verified', 'media']);
Route::post('/story-group/', [StoriesController::class, 'deleteGroup'])->middleware(['auth', 'verified', 'media']);

Route::get('/stories/{storyGroup}', [StoriesController::class, 'edit'])->middleware(['auth', 'verified', 'media'])
    ->name('stories');
Route::post('/stories/{storyGroup}/add', [StoriesController::class, 'create'])->middleware(['auth', 'verified', 'media']);
Route::post('/stories/{storyGroup}', [StoriesController::class, 'destroy'])->middleware(['auth', 'verified', 'media']);

//Route::get('/instagram', [InstagramController::class, 'index'])->middleware(['auth', 'verified', 'editor']);

Route::get('/posts', [InstagramController::class, 'index'])->middleware(['auth', 'verified', 'media'])->name('posts');
Route::get('/posts/verified', [InstagramController::class, 'show'])->middleware(['auth', 'verified', 'media'])->name('posts-verified');
Route::post('/posts/verified/delete/{instagramPost}', [InstagramController::class, 'destroy'])->middleware(['auth', 'verified', 'media']);
Route::post('/posts/add', [InstagramController::class, 'store'])->middleware(['auth', 'verified', 'media']);
Route::post('/posts/create', [InstagramController::class, 'create'])->middleware(['auth', 'verified', 'media']);
//Route::post('/posts/validate/{instagramPost}', [InstagramController::class, 'update'])->middleware(['auth', 'verified']);
//Route::post('/posts/delete/{instagramPost}', [InstagramController::class, 'destroy'])->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//// Create Link to storage
//Route::get('/linkstorage', function () {
//    Artisan::call('storage:link');
//    echo 'ok';
//});

Route::get('/down', function () {
    Artisan::call('down');
    echo 'ok';
})->middleware(['auth', 'verified', 'admin']);

Route::get('/up', function () {
    Artisan::call('up');
    echo 'ok';
})->middleware(['auth', 'verified', 'admin'])->name('up');

require __DIR__.'/auth.php';
