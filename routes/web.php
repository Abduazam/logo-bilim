<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Dashboard routes.
 */
Route::redirect('/', '/dashboard');

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Dashboard\Home\HomeController::class, 'index'])->name('home');

    Route::prefix('features')->name('features.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\Features\FeatureController::class, 'index'])->name('index');

        Route::prefix('languages')->name('languages.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Features\Languages\LanguageController::class, 'index'])->name('index');
        });

        Route::resource('table-columns', \App\Http\Controllers\Dashboard\Features\TableColumns\TableColumnController::class)->except(['destroy']);
    });

    Route::get('change-language/{language}', \App\Http\Controllers\Dashboard\Features\Languages\LanguageChangeController::class)->name('change-language');

})->middleware(['auth', 'verified']);
