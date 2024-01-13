<?php

namespace App\Http\Controllers\Dashboard\Management;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Repositories\Dashboard\Management\ManagementRepository;

class ManagementController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(ManagementRepository $repository): View
    {
        return view('dashboard.management.index', [
            'appointments' => $repository->getAppointmentsCount(),
            'consultations' => $repository->getConsultationsCount(),
        ]);
    }
}
