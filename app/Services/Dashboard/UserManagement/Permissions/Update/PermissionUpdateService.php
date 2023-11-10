<?php

namespace App\Services\Dashboard\UserManagement\Permissions\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Models\Dashboard\UserManagement\Permissions\Permission;

class PermissionUpdateService extends UpdateService
{
    protected array $translations;
    protected Permission $permission;

    public function __construct(array $data, Permission $permission)
    {
        $this->translations = $data['form']['translations'];
        $this->permission = $permission;
    }

    protected function update(): bool|Exception
    {
        return DB::transaction(function () {
            foreach ($this->translations as $key => $translation) {
                $this->permission->translations->where('slug', $key)->first()->update([
                    'translation' => $translation,
                ]);
            }

            return true;
        }, 5);
    }
}
