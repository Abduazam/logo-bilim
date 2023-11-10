<?php

namespace App\Services\Dashboard\UserManagement\Users\Delete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Contracts\Abstracts\Services\Delete\DeleteService;

class UserDeleteService extends DeleteService
{
    public function __construct(protected User $user) { }

    protected function delete(): bool|Exception
    {
        return DB::transaction(function () {
            $this->user->delete();

            return true;
        }, 5);
    }
}
