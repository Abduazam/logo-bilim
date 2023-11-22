<?php

namespace App\Livewire\UserManagement\Roles\Traits;

use Livewire\Attributes\Validate;

trait ActionOnPermissions
{
    #[Validate('nullable|numeric|exists:permissions,id')]
    public ?int $current_permission = null;
    public array $permissions = [];

    public function addPermission($id): void
    {
        $this->form->role_permissions[$id] = $this->permissions[$id];
        unset($this->permissions[$id]);
        $this->resetPermissionId();
    }

    public function removePermission($id): void
    {
        $this->permissions[$id] = $this->form->role_permissions[$id];
        unset($this->form->role_permissions[$id]);
        ksort($this->permissions);
        $this->resetPermissionId();
    }

    private function resetPermissionId(): void
    {
        $this->current_permission = null;
    }
}
