<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\ChessController;
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\IndexController;


    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [IndexController::class, "index"])->name('home');
        Route::get('/cabinet', [IndexController::class, "cabinet"])->name('cabinet');
        Route::get('/log', [LogController::class, "index"])->name('log');
        Route::get('/stat', [ChessController::class, "stat"])->name('stat');
    });
