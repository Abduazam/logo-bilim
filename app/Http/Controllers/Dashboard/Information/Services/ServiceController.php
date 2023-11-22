<?php

namespace App\Http\Controllers\Dashboard\Information\Services;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;

class ServiceController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.information.services.index');
    }
}
