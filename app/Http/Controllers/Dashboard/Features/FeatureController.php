<?php

namespace App\Http\Controllers\Dashboard\Features;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashboardController;

class FeatureController extends DashboardController
{
    public function index(): View
    {
        return view('dashboard.features.index');
    }
}
