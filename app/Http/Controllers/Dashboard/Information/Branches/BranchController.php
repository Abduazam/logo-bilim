<?php

namespace App\Http\Controllers\Dashboard\Information\Branches;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;

class BranchController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.information.branches.index');
    }
}
