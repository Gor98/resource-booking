<?php

use App\Http\Middleware\OptionalAuthenticate;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('api')
                ->prefix('api/auth')
                ->name('auth.')
                ->group(base_path('routes/auth.php'));

            Route::middleware('api')
                ->prefix('api/resources')
                ->name('resources.')
                ->group(base_path('routes/resource.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
