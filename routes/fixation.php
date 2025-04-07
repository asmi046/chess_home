<?php
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\FixationController;
    use App\Http\Controllers\UserController;

    Route::middleware('auth')->group(function () {

        Route::get('/fixation/get_manager_list', [UserController::class, "get_manager_list"])->name('fixation.get_manager_list');
        Route::get('/fixation/get_action_list/{flat_id}', [FixationController::class, "get_action_list"])->name('fixation.get_action_list');
        Route::post('/fixation/do_fixation', [FixationController::class, "do_fixation"])->name('fixation.do_fixation');
        Route::post('/fixation/clear_fixation', [FixationController::class, "clear_fixation"])->name('fixation.clear_fixation');
    });
