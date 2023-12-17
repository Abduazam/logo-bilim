<?php

namespace App\Http\Controllers\Dashboard\Reports;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;

class ReportController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.reports.index');
    }
}
