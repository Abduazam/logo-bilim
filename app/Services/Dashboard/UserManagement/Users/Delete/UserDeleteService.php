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
        try {
            DB::transaction(function () {
                $this->user->delete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
