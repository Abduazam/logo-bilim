<?php

namespace App\Services\Dashboard\UserManagement\Users\ForceDelete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Contracts\Abstracts\Services\ForceDelete\ForceDeleteService;

class UserForceDeleteService extends ForceDeleteService
{
    public function __construct(protected User $user) { }

    protected function forceDelete(): bool|Exception
    {
        return DB::transaction(function () {
            $this->user->forceDelete();

            return true;
        }, 5);
    }
}
