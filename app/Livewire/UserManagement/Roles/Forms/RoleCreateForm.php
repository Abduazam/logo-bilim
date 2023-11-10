<?php

namespace App\Livewire\UserManagement\Roles\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;

class RoleCreateForm extends Form
{
    #[Rule('required|string|unique:roles,name|min:2')]
    public ?string $name = null;

    #[Rule('required|array')]
    public array $role_permissions = [];
}
