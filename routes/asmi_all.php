<?php

use App\Http\Controllers\ChessController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PublicFlatController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [IndexController::class, 'index'])->name('home');
    Route::get('/cabinet', [IndexController::class, 'cabinet'])->name('cabinet');
    Route::get('/events_log', [LogController::class, 'index'])->name('log');
    Route::get('/stat', [ChessController::class, 'stat'])->name('stat');
});

Route::get('/flat/{id}', [PublicFlatController::class, 'index'])->name('public_flat');
Route::get('/feed_yrl_v_2/{sectionId?}', [FeedController::class, 'index'])
    ->whereNumber('sectionId')
    ->name('public_feed');

Route::get('/feed_for_domclick/{sectionId?}', [FeedController::class, 'domClickFeed'])
    ->whereNumber('sectionId')
    ->name('public_feed_domclick');
