<?php

namespace App\Http\Controllers\Dashboard\UserManagement\Permissions;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;

class PermissionController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.user-management.permissions.index');
    }
}
