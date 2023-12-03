<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\View\View;

class SettingsController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.settings.index', [
            'user' => auth()->user(),
        ]);
    }
}
