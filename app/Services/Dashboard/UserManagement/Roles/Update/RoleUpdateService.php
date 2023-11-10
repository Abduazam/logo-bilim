<?php

namespace App\Services\Dashboard\UserManagement\Roles\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\UserManagement\Roles\Role;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Services\Dashboard\UserManagement\Roles\Check\RoleCheckDefaultPermissionsService;

class RoleUpdateService extends UpdateService
{
    protected string $name;
    protected array $permissions;
    protected Role $role;

    public function __construct(array $data, Role $role)
    {
        $this->name = $data['form']['name'];
        $this->permissions = array_keys($data['form']['role_permissions']);
        $this->role = $role;
    }

    protected function update(): bool|Exception
    {
        return DB::transaction(function () {
            $this->role->update([
                'name' => $this->name,
            ]);

            $newPermissions = $this->permissions;
            $currentPermissions = $this->role->permissions;
            $permissionsToRemove = $currentPermissions->reject(function ($permission) use ($newPermissions) {
                return in_array($permission->name, $newPermissions);
            });

            $this->role->revokePermissionTo($permissionsToRemove);

            $permissions = collect($newPermissions)->diff($currentPermissions->pluck('name')->toArray());
            $this->role->givePermissionTo($permissions);

            $checking = new RoleCheckDefaultPermissionsService($this->role);
            $checking->checkOrGive();

            return true;
        }, 5);
    }
}
