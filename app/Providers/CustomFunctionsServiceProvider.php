<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomFunctionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        require_once app_path('Helpers/Functions/string-checker.php');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
