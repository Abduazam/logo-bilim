<?php

namespace App\Models\Dashboard\UserManagement\Users\Traits;

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
        $count = 0;
        foreach ($this->roles as $role) {
            $count += $role->permissions->count();
        }

        return $count;
    }

    /**
     * Get user's photo and generate.
     *
     * @return string
     */
    public function getPhoto(): string
    {
        return !is_null($this->photo)
            ? '<img src="/storage/' . $this->photo . '" alt="' . $this->name . '" class="w-25">'
            : '';
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
