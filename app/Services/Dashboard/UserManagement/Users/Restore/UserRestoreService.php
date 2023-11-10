<?php

namespace App\Services\Dashboard\UserManagement\Users\Restore;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Contracts\Abstracts\Services\Restore\RestoreService;

class UserRestoreService extends RestoreService
{
    public function __construct(protected User $user) { }

    protected function restore(): bool|Exception
    {
        return DB::transaction(function () {
            $this->user->restore();

            return true;
        }, 5);
    }
}
