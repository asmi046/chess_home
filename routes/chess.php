<?php

use App\Http\Controllers\ChessController;
use App\Http\Controllers\SectionController;
    use Illuminate\Support\Facades\Route;

    Route::middleware('auth')->group(function () {
        Route::get('/get_section_list', [SectionController::class, "get_section_list"])->name('get_section_list');
        Route::get('/get_chess_data_by_section/{section_id}', [ChessController::class, "get_chess_data_by_section"])->name('get_chess_data_by_section');
    });
