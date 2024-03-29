<?php

namespace App\Repositories\Dashboard\UserManagement;

use Spatie\Permission\Models\Permission;
use App\Models\Dashboard\UserManagement\Roles\Role;
use App\Models\Dashboard\UserManagement\Users\User;

class UserManagementRepository
{
    public function getUsersCount(): int
    {
        return User::query()->whereNot('id', 1)->count();
    }

    public function getRolesCount(): int
    {
        return Role::query()->whereNot('name', 'super-admin')->count();
    }

    public function getPermissionsCount(): int
    {
        return Permission::query()->count();
    }
}
