<?php

namespace App\Livewire\UserManagement\Roles\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class RoleCreateForm extends Form
{
    #[Validate('required|string|unique:roles,name|min:2')]
    public ?string $name = null;

    #[Validate([
        'role_permissions' => 'required|array',
        'role_permissions.*' => 'required|string',
    ])]
    public array $role_permissions = [];
}
