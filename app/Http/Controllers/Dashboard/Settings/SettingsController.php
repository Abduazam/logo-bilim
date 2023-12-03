<?php

namespace App\Http\Controllers\Dashboard\Settings;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;

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
