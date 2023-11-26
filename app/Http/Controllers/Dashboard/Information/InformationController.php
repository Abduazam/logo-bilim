<?php

namespace App\Http\Controllers\Dashboard\Information;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Repositories\Dashboard\Information\InformationRepository;

class InformationController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(InformationRepository $repository): View
    {
        return view('dashboard.information.index', [
            'branches' => $repository->getBranchesCount(),
            'services' => $repository->getServicesCount(),
            'teachers' => $repository->getTeachersCount(),
        ]);
    }
}
