<?php

namespace App\Livewire\UserManagement\Users\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;

class UserCreateForm extends Form
{
    #[Rule('required|string|min:3')]
    public ?string $name = null;

    #[Rule('required|email|min:3')]
    public ?string $email = null;

    #[Rule('required|numeric|exists:roles,id')]
    public int|null $role_id = null;

    #[Rule('required|array')]
    public array $chosen_branches = [];

    #[Rule('required|string|min:3')]
    public ?string $password = null;

    #[Rule('nullable|image|mimes:jpg,jpeg,png,gif|max:5120')]
    public mixed $photo = null;
}
