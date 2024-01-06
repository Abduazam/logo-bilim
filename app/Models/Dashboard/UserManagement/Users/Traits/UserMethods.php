<?php

namespace App\Models\Dashboard\UserManagement\Users\Traits;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

trait UserMethods
{
    /**
     * Get user's all roles and make it in one string.
     *
     * @return string
     */
    public function getRolesName(): string
    {
        return $this->roles->pluck('name')->implode(PHP_EOL);
    }

    /**
     * Get user's all permissions.
     *
     * @return int
     */
    public function getPermissionsCount(): int
    {
        return $this->roles->flatMap->permissions->count();
    }

    /**
     * Get user's all branches and make it in one string.
     *
     * @return string
     */
    public function getBranchName(): string
    {
        return $this->branches->pluck('title')->implode(PHP_EOL);
    }

    /**
     * Get user's all permissions as array.
     *
     * @return Collection
     */
    public function getPermissions(): Collection
    {
        $roleIds = $this->roles->pluck('id')->toArray();

        return Permission::whereHas('roles', function ($query) use ($roleIds) {
                $query->whereIn('role_id', $roleIds);
            })->get();
    }

    /**
     * Checks user is admin or not.
     *
     * @return bool
     */
    public function admin(): bool
    {
        return $this->hasRole('admin');
    }
}
