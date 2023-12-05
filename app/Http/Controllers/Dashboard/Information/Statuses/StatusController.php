<?php

namespace App\Http\Controllers\Dashboard\Information\Statuses;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Repositories\Dashboard\Information\Statuses\StatusRepository;

class StatusController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(StatusRepository $repository): View
    {
        return view('dashboard.information.statuses.index', [
            'relatives' => $repository->getRelativeStatusesCount(),
            'appointments' => $repository->getAppointmentStatusesCount(),
        ]);
    }
}
