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

            foreach (['create', 'update', 'delete', 'restore', 'force-delete'] as $action) {
                Route::get($action, function () {
                    abort(404);
                })->name($action);
            }
        });

        Route::resource('tables', \App\Http\Controllers\Dashboard\Features\Tables\TableController::class)->except(['create', 'store', 'show', 'update', 'destroy']);

        Route::prefix('texts')->name('texts.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Features\Texts\TextController::class, 'index'])->name('index');
        });

        Route::prefix('icons')->name('icons.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Features\Icons\IconController::class, 'index'])->name('index');
        });
    });

    Route::prefix('user-management')->name('user-management.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\UserManagement\UserManagementController::class, 'index'])->name('index');

        Route::resource('users', \App\Http\Controllers\Dashboard\UserManagement\Users\UserController::class)->except(['store', 'update', 'destroy']);
        Route::prefix('users')->name('users.')->group(function () {
            foreach (['delete', 'restore', 'force-delete'] as $action) {
                Route::get($action, function () {
                    abort(404);
                })->name($action);
            }
        });

        Route::resource('roles', \App\Http\Controllers\Dashboard\UserManagement\Roles\RoleController::class)->except(['store', 'update', 'destroy']);
        Route::prefix('roles')->name('roles.')->group(function () {
            foreach (['delete', 'restore', 'force-delete'] as $action) {
                Route::get($action, function () {
                    abort(404);
                })->name($action);
            }
        });

        Route::prefix('permissions')->name('permissions.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\UserManagement\Permissions\PermissionController::class, 'index'])->name('index');
            Route::get('update', function () {
                abort(404);
            })->name('update');
        });

    });

    Route::get('change-language/{language}', \App\Http\Controllers\Dashboard\Features\Languages\LanguageChangeController::class)->name('change-language');
})->middleware(['auth', 'verified', 'has_permission']);
