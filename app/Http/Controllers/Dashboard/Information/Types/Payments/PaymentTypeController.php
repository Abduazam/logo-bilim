<?php

namespace App\Http\Controllers\Dashboard\Information\Types\Payments;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;

class PaymentTypeController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.information.types.payments.index');
    }
}
