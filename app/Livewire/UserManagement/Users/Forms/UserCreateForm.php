<?php

namespace App\Livewire\UserManagement\Users\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class UserCreateForm extends Form
{
    #[Validate('required|string|min:3')]
    public ?string $name = null;

    #[Validate('required|email|min:3')]
    public ?string $email = null;

    #[Validate('required|numeric|exists:roles,id')]
    public int|null $role_id = null;

    #[Validate([
        'chosen_branches' => 'required|array',
        'chosen_branches.*' => 'required|string',
    ])]
    public array $chosen_branches = [];

    #[Validate('required|string|min:3')]
    public ?string $password = null;

    #[Validate('nullable|image|mimes:jpg,jpeg,png,gif|max:5120')]
    public mixed $photo = null;
}
