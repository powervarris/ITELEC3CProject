<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DeckController;

// Common Routes
Route::view('/', 'common.home')->name('home');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::view('/forum', 'common.forum')->name('forum');

Route::get('/deckbuilder', [DeckController::class, 'index'])->name('deckbuilder');
Route::view('/about', 'common.about')->name('about');

// Jetstream-specific Routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/forum/general', [ForumController::class, 'index'])->name('forum.general');

    Route::get('/forum/deck', [ForumController::class, 'indexDeck'])->name('forum.deck');

    Route::get('/forum/card', [ForumController::class, 'indexCard'])->name('forum.card');

    // Backend Routes
    Route::post('/forum/general', [ForumController::class, 'store'])->name('forum.general.store');
    Route::post('/forum/general/card', [ForumController::class, 'storeCard'])->name('forum.card.store');
    Route::post('/forum/general/deck', [ForumController::class, 'storeDeck'])->name('forum.deck.store');

    Route::delete('/forum/general/{post}', [ForumController::class, 'destroy'])->name('forum.general.destroy');
    Route::delete('/forum/deck/{post}', [ForumController::class, 'destroyDeck'])->name('forum.deck.destroy');
    Route::delete('/forum/card/{post}', [ForumController::class, 'destroyCard'])->name('forum.card.destroy');

    Route::put('/forum/general/{post}', [PostController::class, 'update'])->name('forum.general.update');
    Route::put('/forum/deck/{post}', [PostController::class, 'updateDeck'])->name('forum.deck.update');
    Route::put('/forum/card/{post}', [PostController::class, 'updateCard'])->name('forum.card.update');

    Route::post('/forum/general/{post}/comment', [ForumController::class, 'storeComment'])->name('forum.general.comment.store');
    Route::post('/forum/deck/{post}/comment', [ForumController::class, 'storeCommentDeck'])->name('forum.deck.comment.store');
    Route::post('/forum/card/{post}/comment', [ForumController::class, 'storeCommentCard'])->name('forum.card.comment.store');

    Route::post('/news', [NewsController::class, 'store'])->name('news.store');

    Route::delete('/forum/general/comment/{comment}', [ForumController::class, 'destroyComment'])->name('forum.general.comment.destroy');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
});

Route::get('/news', [NewsController::class, 'index'])->name('news.index');

