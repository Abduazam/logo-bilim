<?php

namespace App\Models\Dashboard\UserManagement\Roles\Traits;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

trait RoleMethods
{
    /**
     * Get role's all permissions as array.
     *
     * @return Collection
     */
    public function getPermissions(): Collection
    {
        $role_id = $this->id;

        return Permission::whereHas('roles', function ($query) use ($role_id) {
                $query->where('role_id', $role_id);
            })->get();
    }

    /**
     * Checks user is admin or not.
     *
     * @return bool
     */
    public function admin(): bool
    {
        return $this->name === 'admin';
    }
}
