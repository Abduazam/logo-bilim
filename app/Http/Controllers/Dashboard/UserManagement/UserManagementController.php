<?php

namespace App\Http\Controllers\Dashboard\UserManagement;

use Illuminate\View\View;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Repositories\Dashboard\UserManagement\UserManagementRepository;

class UserManagementController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserManagementRepository $repository): View
    {
        return view('dashboard.user-management.index', [
            'users' => $repository->getUsersCount(),
            'roles' => $repository->getRolesCount(),
            'permissions' => $repository->getPermissionsCount(),
        ]);
    }
}
