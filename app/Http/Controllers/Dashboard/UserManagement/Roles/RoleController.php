<?php

namespace App\Http\Controllers\Dashboard\UserManagement\Roles;

use Illuminate\View\View;
use App\Models\Dashboard\UserManagement\Roles\Role;
use App\Http\Controllers\Dashboard\DashboardController;

class RoleController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.user-management.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dashboard.user-management.roles.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role): View
    {
        return view('dashboard.user-management.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        return view('dashboard.user-management.roles.edit', compact('role'));
    }
}
