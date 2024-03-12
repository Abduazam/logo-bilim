<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Barryvdh\Debugbar\Facades\Debugbar;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
//        if ($this->app->environment('local')) {
//            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
//        }
//
//        // ...
//
//        $this->app->booting(function () {
//            if ($this->app->environment('production')) {
//                Debugbar::disable();
//            }
//        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        $this->loadMigrationsFrom(database_path('migrations/*'));
        $this->loadMigrationsFrom(database_path('migrations/*/*'));
        $this->loadMigrationsFrom(database_path('migrations/*/*/*'));
    }
}
