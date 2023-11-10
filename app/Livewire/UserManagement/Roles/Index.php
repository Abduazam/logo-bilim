<?php

namespace App\Livewire\UserManagement\Roles;

use Livewire\Component;
use Illuminate\View\View;

class Index extends Component
{
    public function render(): View
    {
        return view('livewire.user-management.roles.index');
    }
}
