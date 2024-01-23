<?php

namespace App\Livewire\UserManagement\Roles;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\UserManagement\Roles\Role;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\UserManagement\Roles\Delete\RoleDeleteService;

class Delete extends Component
{
    use DispatchingTrait;

    public Role $role;

    /**
     * @throws Exception
     */
    public function delete(): void
    {
        $service = new RoleDeleteService($this->role);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchForDelete('role', $this->role->name);
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.user-management.roles.delete');
    }
}
