<?php

namespace App\Http\Controllers\Dashboard\UserManagement\Users;

use Illuminate\View\View;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Http\Controllers\Dashboard\DashboardController;

class UserController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.user-management.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dashboard.user-management.users.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('dashboard.user-management.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('dashboard.user-management.users.edit', compact('user'));
    }
}
