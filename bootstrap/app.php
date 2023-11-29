<?php

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the brain for all of the Laravel components. We will
| also use the application to configure core, foundational behavior.
|
*/

return Application::configure()
    ->withProviders()
    ->withRouting(function () {
        //

        // RateLimiter::for_('api', function (Request $request) {
        //     return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        // });

        // Route::middleware('api')->prefix('api')->group(__DIR__.'/../routes/api.php');
        Route::middleware('web')->group(__DIR__.'/../routes/web.php');
        Route::group([], __DIR__.'/../routes/routes.php');
    })
    ->withCommands([
        __DIR__.'/../routes/console.php',
    ])
    // ->withBroadcasting(
    //     __DIR__.'/../routes/channels.php'
    // )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //

        $property = (new \ReflectionClass($exceptions->handler))->getProperty('internalDontReport');
        $property->setAccessible(true);
        $property->setValue($exceptions->handler, []);

        return $property;
    })->create();
