<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DeckController;

// Common Routes
Route::view('/', 'common.home')->name('home');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::view('/forum', 'common.forum')->name('forum');

Route::get('/forum/general', function () {
    return view('forum.general');
})->name('forum.general');

Route::get('/forum/deck', function () {
    return view('forum.deck');
})->name('forum.deck');

Route::get('/forum/card', function () {
    return view('forum.card');
})->name('forum.card');

Route::get('/deckbuilder', [DeckController::class, 'index'])->name('deckbuilder');
Route::view('/about', 'common.about')->name('about');

// Jetstream-specific Routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});
