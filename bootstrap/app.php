<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        commands: __DIR__.'/../routes/console.php',
        using:function(){

            Route::middleware('web')
            ->group(base_path('routes/web.php'));

            Route::middleware('web')
            ->group(base_path('routes/emi.php'));

            Route::middleware('web')
            ->group(base_path('routes/sebas.php'));

            Route::middleware('web')
            ->group(base_path('routes/andy.php'));

            Route::middleware('web')
            ->group(base_path('routes/robert.php'));

            Route::middleware('web')
            ->group(base_path('routes/bris.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
