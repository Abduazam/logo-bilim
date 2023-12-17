<?php

namespace App\Http\Controllers\Dashboard\Reports\DailyReports;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;

class DailyReportController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.reports.daily-reports.index');
    }
}
