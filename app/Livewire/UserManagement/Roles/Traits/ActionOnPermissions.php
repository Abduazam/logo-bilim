<?php

namespace App\Livewire\UserManagement\Roles\Traits;

trait ActionOnPermissions
{
    public int $current_permission = 0;
    public array $permissions = [];

    public function addPermission($id): void
    {
        $this->form->role_permissions[$id] = $this->permissions[$id];
        unset($this->permissions[$id]);
        $this->current_permission = 0;
    }

    public function removePermission($id): void
    {
        $this->permissions[$id] = $this->form->role_permissions[$id];
        unset($this->form->role_permissions[$id]);
        ksort($this->permissions);
        $this->current_permission = 0;
    }
}
