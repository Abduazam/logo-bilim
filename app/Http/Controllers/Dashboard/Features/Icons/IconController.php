<?php

namespace App\Http\Controllers\Dashboard\Features\Icons;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashboardController;

class IconController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.features.icons.index');
    }
}
