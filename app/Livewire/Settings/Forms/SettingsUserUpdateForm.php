<?php

namespace App\Livewire\Settings\Forms;

use App\Models\Dashboard\UserManagement\Users\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SettingsUserUpdateForm extends Form
{
    #[Validate('required|string|min:3')]
    public ?string $name = null;

    #[Validate('required|email|min:3')]
    public ?string $email = null;

    #[Validate('nullable|string|min:3')]
    public ?string $password = null;

    #[Validate('nullable|image|mimes:jpg,jpeg,png,gif|max:5120')]
    public mixed $photo = null;

    public function setValues(User $user): void
    {
        $this->name = $user->name;
        $this->email = $user->email;
        $this->photo = $user->photo;
    }
}
