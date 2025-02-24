<?php
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\IndexController;


    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [IndexController::class, "index"])->name('home');
        Route::get('/cabinet', [IndexController::class, "cabinet"])->name('cabinet');
    });
