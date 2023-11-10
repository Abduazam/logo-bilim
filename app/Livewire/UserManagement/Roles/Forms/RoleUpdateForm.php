<?php

namespace App\Livewire\UserManagement\Roles\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use App\Models\Dashboard\UserManagement\Roles\Role;

class RoleUpdateForm extends Form
{
    #[Rule('required|string|min:2')]
    public ?string $name = null;

    #[Rule('required|array')]
    public array $role_permissions = [];

    public function setValues(Role $role): void
    {
        $this->name = $role->name;
        foreach ($role->permissions as $permission) {
            $this->role_permissions[$permission->id] = $permission->name;
        }
    }
}
