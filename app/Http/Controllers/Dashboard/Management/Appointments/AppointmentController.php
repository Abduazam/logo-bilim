<?php

namespace App\Http\Controllers\Dashboard\Management\Appointments;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Models\Dashboard\Management\Appointments\Appointment;

class AppointmentController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.management.appointments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment): View
    {
        return view('dashboard.management.appointments.show', compact('appointment'));
    }
}
