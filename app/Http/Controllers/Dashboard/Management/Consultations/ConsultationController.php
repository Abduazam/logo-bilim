<?php

namespace App\Http\Controllers\Dashboard\Management\Consultations;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Models\Dashboard\Management\Consultations\Consultation;

class ConsultationController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.management.consultations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation): View
    {
        return view('dashboard.management.consultations.show', compact('consultation'));
    }
}
