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

    Route::prefix('information')->name('information.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\Information\InformationController::class, 'index'])->name('index');

        Route::prefix('branches')->name('branches.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Information\Branches\BranchController::class, 'index'])->name('index');

            foreach (['create', 'update', 'delete', 'restore', 'force-delete'] as $action) {
                Route::get($action, function () {
                    abort(404);
                })->name($action);
            }
        });

        Route::prefix('services')->name('services.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Information\Services\ServiceController::class, 'index'])->name('index');

            foreach (['create', 'update', 'delete', 'restore', 'force-delete'] as $action) {
                Route::get($action, function () {
                    abort(404);
                })->name($action);
            }
        });

        Route::resource('teachers', \App\Http\Controllers\Dashboard\Information\Teachers\TeacherController::class)->except(['store', 'update', 'destroy']);
        Route::prefix('teachers')->name('teachers.')->group(function () {
            foreach (['delete', 'restore', 'force-delete'] as $action) {
                Route::get($action, function () {
                    abort(404);
                })->name($action);
            }
        });

        Route::resource('clients', \App\Http\Controllers\Dashboard\Information\Clients\ClientController::class)->except(['store', 'update', 'destroy']);
        Route::prefix('clients')->name('clients.')->group(function () {
            foreach (['delete', 'restore', 'force-delete'] as $action) {
                Route::get($action, function () {
                    abort(404);
                })->name($action);
            }
        });

        Route::prefix('types')->name('types.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Information\Types\TypeController::class, 'index'])->name('index');

            Route::prefix('payments')->name('payments.')->group(function () {
                Route::get('/', [\App\Http\Controllers\Dashboard\Information\Types\Payments\PaymentTypeController::class, 'index'])->name('index');

                foreach (['create', 'update', 'delete', 'restore', 'force-delete'] as $action) {
                    Route::get($action, function () {
                        abort(404);
                    })->name($action);
                }
            });
        });

        Route::prefix('statuses')->name('statuses.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Information\Statuses\StatusController::class, 'index'])->name('index');

            Route::prefix('relatives')->name('relatives.')->group(function () {
                Route::get('/', [\App\Http\Controllers\Dashboard\Information\Statuses\Relatives\RelativeController::class, 'index'])->name('index');

                foreach (['create', 'update', 'delete', 'restore', 'force-delete'] as $action) {
                    Route::get($action, function () {
                        abort(404);
                    })->name($action);
                }
            });

            Route::prefix('appointments')->name('appointments.')->group(function () {
                Route::get('/', [\App\Http\Controllers\Dashboard\Information\Statuses\Appointments\AppointmentController::class, 'index'])->name('index');

                foreach (['create', 'update', 'delete', 'restore', 'force-delete'] as $action) {
                    Route::get($action, function () {
                        abort(404);
                    })->name($action);
                }
            });
        });
    });

    Route::prefix('management')->name('management.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\Management\ManagementController::class, 'index'])->name('index');

        Route::resource('appointments', \App\Http\Controllers\Dashboard\Management\Appointments\AppointmentController::class)->except(['store', 'update', 'destroy']);
        Route::prefix('appointments')->name('appointments.')->group(function () {
            foreach (['delete', 'restore', 'force-delete'] as $action) {
                Route::get($action, function () {
                    abort(404);
                })->name($action);
            }
        });

        Route::resource('consultations', \App\Http\Controllers\Dashboard\Management\Consultations\ConsultationController::class)->except(['store', 'update', 'destroy']);
        Route::prefix('consultations')->name('consultations.')->group(function () {
            foreach (['delete', 'restore', 'force-delete'] as $action) {
                Route::get($action, function () {
                    abort(404);
                })->name($action);
            }
        });
    });

    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\Reports\ReportController::class, 'index'])->name('index');

        Route::prefix('debts')->name('debts.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Reports\Debts\DebtController::class, 'index'])->name('index');
        });

        Route::prefix('daily-reports')->name('daily-reports.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Reports\DailyReports\DailyReportController::class, 'index'])->name('index');
        });
    });

    Route::get('settings', [\App\Http\Controllers\Dashboard\Settings\SettingsController::class, 'index'])->name('settings');

})->middleware(['auth', 'verified', 'has_permission']);
