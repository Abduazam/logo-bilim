<?php

namespace App\Services\Dashboard\UserManagement\Permissions\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Models\Dashboard\UserManagement\Permissions\Permission;

class PermissionUpdateService extends UpdateService
{
    protected Permission $permission;
    protected array $translations;

    public function __construct(array $data, Permission $permission)
    {
        $this->permission = $permission;
        $this->translations = $data['translations'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                foreach ($this->translations as $key => $translation) {
                    $this->permission->translations->where('slug', $key)->first()->update([
                        'translation' => $translation,
                    ]);
                }
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
