<?php

namespace App\Livewire\UserManagement\Users\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\UserManagement\Users\User;

class UserUpdateForm extends Form
{
    #[Validate('required|string|min:3')]
    public ?string $name = null;

    #[Validate('required|email|min:3')]
    public ?string $email = null;

    #[Validate('required|numeric|exists:roles,id', as: 'role')]
    public int|null $role_id = null;

    #[Validate([
        'chosen_branches' => 'required|array',
        'chosen_branches.*' => 'required|string',
    ], as: [
        'chosen_branches' => 'branches',
    ])]
    public array $chosen_branches = [];

    #[Validate('nullable|string|min:3')]
    public ?string $password = null;

    #[Validate('nullable|image|mimes:jpg,jpeg,png,gif|max:5120')]
    public mixed $photo = null;

    public function setValues(User $user): void
    {
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role_id = $user->roles->first()->id;
        $this->chosen_branches = $user->branches->pluck('title', 'id')->toArray();
        $this->photo = $user->photo;
    }
}
