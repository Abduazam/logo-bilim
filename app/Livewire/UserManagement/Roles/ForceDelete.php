<?php

namespace App\Livewire\UserManagement\Roles;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\UserManagement\Roles\Role;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\UserManagement\Roles\ForceDelete\RoleForceDeleteService;

class ForceDelete extends Component
{
    use DispatchingTrait;

    public Role $role;

    /**
     * @throws Exception
     */
    public function forceDelete(): void
    {
        $service = new RoleForceDeleteService($this->role);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchForForceDelete('role', $this->role->name);
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.user-management.roles.force-delete');
    }
}
