<?php

namespace App\Livewire\UserManagement\Permissions\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Permission;

class PermissionUpdateForm extends Form
{
    #[Validate('required|string')]
    public ?string $translation = null;

    public function setValues(Permission $permission): void
    {
        $this->translation = $permission->translation;
    }
}
