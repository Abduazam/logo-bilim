<?php

namespace App\Services\Dashboard\UserManagement\Roles\Restore;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\UserManagement\Roles\Role;
use App\Contracts\Abstracts\Services\Restore\RestoreService;

class RoleRestoreService extends RestoreService
{
    public function __construct(protected Role $role) { }

    protected function restore(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->role->restore();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
