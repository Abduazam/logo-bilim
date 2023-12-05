<?php

namespace App\Http\Controllers\Dashboard\Information\Statuses\Relatives;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;

class RelativeController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.information.statuses.relatives.index');
    }
}
