<?php

namespace App\Livewire\UserManagement\Users\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use App\Models\Dashboard\UserManagement\Users\User;

class UserUpdateForm extends Form
{
    #[Rule('required|string|min:3')]
    public ?string $name = null;

    #[Rule('required|email|min:3')]
    public ?string $email = null;

    #[Rule('required|numeric|exists:roles,id')]
    public int|null $role_id = null;

    #[Rule('required|array')]
    public array $chosen_branches = [];

    #[Rule('nullable|string|min:3')]
    public ?string $password = null;

    #[Rule('nullable|image|mimes:jpg,jpeg,png,gif|max:5120')]
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
