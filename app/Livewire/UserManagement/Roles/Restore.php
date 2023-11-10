<?php

namespace App\Livewire\UserManagement\Roles;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\UserManagement\Roles\Role;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\UserManagement\Roles\Restore\RoleRestoreService;

class Restore extends Component
{
    use DispatchingTrait;

    public Role $role;

    /**
     * @throws Exception
     */
    public function restore(): void
    {
        $service = new RoleRestoreService($this->role);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-rotate-left text-primary', 'restored-successfully', "<b>Role restored:</b {$this->role->name}>");
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.user-management.roles.restore');
    }
}
