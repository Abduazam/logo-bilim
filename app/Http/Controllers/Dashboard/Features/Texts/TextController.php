<?php

namespace App\Http\Controllers\Dashboard\Features\Texts;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashboardController;

class TextController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.features.texts.index');
    }
}
