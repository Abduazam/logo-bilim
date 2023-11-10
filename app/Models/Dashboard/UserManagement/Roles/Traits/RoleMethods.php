<?php

namespace App\Models\Dashboard\UserManagement\Roles\Traits;

trait RoleMethods
{
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
