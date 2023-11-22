<?php

namespace App\Livewire\UserManagement\Roles\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\UserManagement\Roles\Role;

class RoleUpdateForm extends Form
{
    #[Validate('required|string|min:2')]
    public ?string $name = null;

    #[Validate([
        'role_permissions' => 'required|array',
        'role_permissions.*' => 'required|string',
    ])]
    public array $role_permissions = [];

    public function setValues(Role $role): void
    {
        $this->name = $role->name;
        $this->role_permissions = $role->permissions->pluck('name', 'id')->toArray();
    }
}
