<?php

namespace App\Http\Controllers\Dashboard\Information\Types;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Repositories\Dashboard\Information\Types\TypeRepository;

class TypeController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(TypeRepository $repository): View
    {
        return view('dashboard.information.types.index', [
            'payments' => $repository->getPaymentTypesCount(),
        ]);
    }
}
