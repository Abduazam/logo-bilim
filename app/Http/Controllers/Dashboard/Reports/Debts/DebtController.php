<?php

namespace App\Http\Controllers\Dashboard\Reports\Debts;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;

class DebtController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.reports.debts.index');
    }
}
