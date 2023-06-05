<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Plain Routes
|--------------------------------------------------------------------------
|
| Routes registered here does not have any group applied.
|
*/

Route::get('_version', function () {
    return Illuminate\Foundation\Application::VERSION;
});

Route::get('_health', function () {
    return response('', 204);
});
