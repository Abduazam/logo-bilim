<?php

namespace App\Services\Dashboard\UserManagement\Roles\Check;

use App\Models\Dashboard\UserManagement\Roles\Role;

class RoleCheckDefaultPermissionsService
{
    protected Role $role;
    protected array $defaultPermissions = [
        'dashboard.home',
        'dashboard.change-language',
    ];

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function checkOrGive(): void
    {
        if (! $this->role->hasAllPermissions($this->defaultPermissions)) {
            $this->role->givePermissionTo($this->defaultPermissions);
        };
    }
}
