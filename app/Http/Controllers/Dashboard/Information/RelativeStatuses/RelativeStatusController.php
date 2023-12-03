<?php

namespace App\Http\Controllers\Dashboard\Information\RelativeStatuses;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;

class RelativeStatusController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.information.relative-statuses.index');
    }
}
