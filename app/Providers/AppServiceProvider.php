<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()/*: void*/
    {
        //

        // Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()/*: void*/
    {
        Date::use_(CarbonImmutable::class);

        if (($appUrl = config('app.url')) && $appUrl !== 'http://localhost') {
            URL::forceRootUrl($appUrl);
            URL::forceScheme(\str_starts_with($appUrl, 'https:') ? 'https' : 'http');
        }

        //

        // Sanctum::usePersonalAccessTokenModel(\Laravel\Sanctum\PersonalAccessToken::class);

        // Schema::defaultStringLength(191);
    }
}
