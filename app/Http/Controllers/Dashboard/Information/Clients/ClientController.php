<?php

namespace App\Http\Controllers\Dashboard\Information\Clients;

use Illuminate\View\View;
use App\Models\Dashboard\Information\Clients\Client;
use App\Http\Controllers\Dashboard\DashboardController;

class ClientController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.information.clients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dashboard.information.clients.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client): View
    {
        return view('dashboard.information.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client): View
    {
        return view('dashboard.information.clients.edit', compact('client'));
    }
}
