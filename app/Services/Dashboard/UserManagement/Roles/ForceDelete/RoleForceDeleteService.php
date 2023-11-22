<?php

namespace App\Services\Dashboard\UserManagement\Roles\ForceDelete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\UserManagement\Roles\Role;
use App\Contracts\Abstracts\Services\ForceDelete\ForceDeleteService;

class RoleForceDeleteService extends ForceDeleteService
{
    public function __construct(protected Role $role) { }

    protected function forceDelete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->role->forceDelete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
