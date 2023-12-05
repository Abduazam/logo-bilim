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
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dashboard.management.appointments.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment): View
    {
        return view('dashboard.management.appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment): View
    {
        return view('dashboard.management.appointments.edit', compact('appointment'));
    }
}
