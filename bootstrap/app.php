<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        using: function () {
            Route::middleware('web')
                ->group(base_path('routes/asmi_all.php'));

            Route::middleware('web')
                ->group(base_path('routes/asmi_auth.php'));

            Route::middleware('web')
                ->group(base_path('routes/chess.php'));

            Route::middleware('web')
                ->group(base_path('routes/fixation.php'));
        }
    )
    ->withSchedule(function (Schedule $schedule) {
        Schedule::command('chess:clear-fixation')->daily();
    })
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
