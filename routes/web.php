<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProfileController;
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

Route::get('/edit-agenda', [AgendaController::class, 'index'])->middleware(['auth', 'verified'])
    ->name('edit-agenda');

Route::get('/edit-agenda/{day}', [AgendaController::class, 'show'])->middleware(['auth', 'verified']);

Route::post('/edit-agenda', [AgendaController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::post('/edit-agenda/add', [AgendaController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/edit-agenda/update', [AgendaController::class, 'update'])->middleware(['auth', 'verified']);

Route::get('/content', [ContentController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('content');

Route::get('/notifications', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])
    ->name('send-notification');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
