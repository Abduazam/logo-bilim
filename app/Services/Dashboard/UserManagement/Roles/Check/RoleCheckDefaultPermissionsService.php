<?php

namespace App\Services\Dashboard\UserManagement\Roles\Check;

class RoleCheckDefaultPermissionsService
{
    protected array $defaultPermissions = [
        'dashboard.home',
        'dashboard.change-language',
    ];

    public function __construct(protected $role) { }

    public function checkOrGive(): void
    {
        if (!$this->role->hasAllPermissions($this->defaultPermissions)) {
            $this->role->givePermissionTo($this->defaultPermissions);
        };
    }
}
