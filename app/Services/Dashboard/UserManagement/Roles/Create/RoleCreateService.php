<?php

namespace App\Services\Dashboard\UserManagement\Roles\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\UserManagement\Roles\Role;
use App\Contracts\Abstracts\Services\Create\CreateService;
use App\Services\Dashboard\UserManagement\Roles\Check\RoleCheckDefaultPermissionsService;

class RoleCreateService extends CreateService
{
    protected string $name;
    protected array $permissions;

    public function __construct(array $data)
    {
        $this->name = $data['form']['name'];
        $this->permissions = array_keys($data['form']['role_permissions']);
    }

    protected function create(): bool|Exception
    {
        return DB::transaction(function () {
            $role = Role::create([
                'name' => $this->name,
            ]);

            $role->givePermissionTo($this->permissions);

            $checking = new RoleCheckDefaultPermissionsService($role);
            $checking->checkOrGive();

            return true;
        }, 5);
    }
}
