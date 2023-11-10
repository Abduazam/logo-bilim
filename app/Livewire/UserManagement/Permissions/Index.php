<?php

namespace App\Livewire\UserManagement\Permissions;

use Livewire\Component;
use Illuminate\View\View;

class Index extends Component
{
    public function render(): View
    {
        return view('livewire.user-management.permissions.index');
    }
}
