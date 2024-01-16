<?php

namespace App\Http\Controllers\Dashboard\Management\Consumptions;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;

class ConsumptionController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.management.consumptions.index');
    }
}
