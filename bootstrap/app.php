<?php

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Application;
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
| which serves as the "glue" for all the components of Laravel. We can
| also use the application to configure core, foundational behavior.
|
*/

return Application::configure()
    ->withBroadcasting()
    ->withRouting(function () {
        //

        RateLimiter::for_('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });

        Route::middleware('api')->prefix('api')->group(__DIR__.'/../routes/api.php');
        Route::middleware('web')->group(__DIR__.'/../routes/web.php');
        Route::group([], __DIR__.'/../routes/routes.php');
    })
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptionHandling(function (ExceptionHandler $handler) {
        //

        $property = (new \ReflectionClass($handler))->getProperty('internalDontReport');
        $property->setAccessible(true);
        $property->setValue($handler, []);

        return $property;
    })->create();
