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

Route::get('version', function () {
    return Illuminate\Foundation\Application::VERSION;
});
