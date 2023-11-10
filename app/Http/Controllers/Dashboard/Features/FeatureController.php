<?php

namespace App\Http\Controllers\Dashboard\Features;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Repositories\Dashboard\Features\FeatureRepository;

class FeatureController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(FeatureRepository $repository): View
    {
        return view('dashboard.features.index', [
            'languages' => $repository->getLanguagesCount(),
            'tables' => $repository->getTableColumnsCount(),
            'texts' => $repository->getTextsCount(),
            'icons' => $repository->getIconsCount(),
        ]);
    }
}
