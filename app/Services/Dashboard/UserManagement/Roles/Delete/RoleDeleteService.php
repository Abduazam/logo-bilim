<?php

namespace App\Services\Dashboard\UserManagement\Roles\Delete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\UserManagement\Roles\Role;
use App\Contracts\Abstracts\Services\Delete\DeleteService;

class RoleDeleteService extends DeleteService
{
    public function __construct(protected Role $role) { }

    protected function delete(): bool|Exception
    {
        return DB::transaction(function () {
            $this->role->delete();

            return true;
        }, 5);
    }
}
