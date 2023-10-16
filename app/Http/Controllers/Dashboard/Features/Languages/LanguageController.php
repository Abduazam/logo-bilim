<?php

namespace App\Http\Controllers\Dashboard\Features\Languages;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashboardController;

class LanguageController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.features.languages.index');
    }
}
