<?php

namespace App\Http\Controllers\Dashboard\Features\TableColumns;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashboardController;

class TableColumnController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.features.table-columns.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
