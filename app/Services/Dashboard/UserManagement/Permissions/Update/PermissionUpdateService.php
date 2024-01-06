<?php

namespace App\Services\Dashboard\UserManagement\Permissions\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use App\Contracts\Abstracts\Services\Update\UpdateService;

class PermissionUpdateService extends UpdateService
{
    protected Permission $permission;
    protected string $translation;

    public function __construct(array $data, Permission $permission)
    {
        $this->permission = $permission;
        $this->translation = $data['translation'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->permission->update([
                    'translation' => $this->translation,
                ]);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
