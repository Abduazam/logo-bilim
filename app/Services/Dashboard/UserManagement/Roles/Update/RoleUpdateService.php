<?php

namespace App\Services\Dashboard\UserManagement\Roles\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\UserManagement\Roles\Role;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Services\Dashboard\UserManagement\Roles\Check\RoleCheckDefaultPermissionsService;

class RoleUpdateService extends UpdateService
{
    protected Role $role;
    protected string $name;
    protected array $permissions;

    public function __construct(array $data, Role $role)
    {
        $this->role = $role;
        $this->name = $data['name'];
        $this->permissions = array_keys($data['role_permissions']);
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
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
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
