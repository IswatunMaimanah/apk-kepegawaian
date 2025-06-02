<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Atur default string length untuk kompatibilitas MySQL lama
        Schema::defaultStringLength(191);

        // Atur locale aplikasi dan Carbon ke Bahasa Indonesia
        App::setLocale('id');
        Carbon::setLocale('id');
        setlocale(LC_TIME, 'id_ID.utf8');
    }
}
