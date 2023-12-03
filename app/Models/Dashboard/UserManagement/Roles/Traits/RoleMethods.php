<?php

namespace App\Models\Dashboard\UserManagement\Roles\Traits;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Dashboard\UserManagement\Permissions\Permission;

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

        return Permission::with('translation')
            ->whereHas('roles', function ($query) use ($role_id) {
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
