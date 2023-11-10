<?php

namespace App\Http\Controllers\Dashboard\Features\Tables;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Models\Dashboard\Features\TableColumns\Tables\Table;

class TableController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.features.tables.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table): View
    {
        return view('dashboard.features.tables.show', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table): View
    {
        return view('dashboard.features.tables.update', compact('table'));
    }
}
