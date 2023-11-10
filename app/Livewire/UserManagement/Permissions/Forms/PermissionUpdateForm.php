<?php

namespace App\Livewire\UserManagement\Permissions\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use App\Models\Dashboard\UserManagement\Permissions\Permission;

class PermissionUpdateForm extends Form
{
    #[Rule('required|array')]
    public array $translations = [];

    public function setValues(Permission $permission): void
    {
        foreach ($permission->translations as $translation) {
            $this->translations[$translation->slug] = $translation->translation;
        }
    }
}