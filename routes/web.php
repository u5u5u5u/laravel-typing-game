<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\SentenceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('sentences', SentenceController::class);
    Route::get('/typing-game', [SentenceController::class, 'showGame'])->name('typing-game');
    Route::post('/save-score', [ScoreController::class, 'store'])->name('save-score');
    Route::get('/scores', [ScoreController::class, 'index'])->name('scores.index');
});

require __DIR__.'/auth.php';
