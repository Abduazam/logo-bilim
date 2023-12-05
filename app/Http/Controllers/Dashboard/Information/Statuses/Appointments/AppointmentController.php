<?php

namespace App\Http\Controllers\Dashboard\Information\Statuses\Appointments;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;

class AppointmentController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.information.statuses.appointments.index');
    }
}
