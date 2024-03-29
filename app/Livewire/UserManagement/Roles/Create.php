<?php

namespace App\Livewire\UserManagement\Roles;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Livewire\UserManagement\Roles\Forms\RoleCreateForm;
use App\Livewire\UserManagement\Roles\Traits\ActionOnPermissions;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\UserManagement\Roles\Create\RoleCreateService;
use App\Repositories\Dashboard\UserManagement\Permissions\PermissionRepository;

class Create extends Component
{
    use DispatchingTrait, ActionOnPermissions;

    public RoleCreateForm $form;

    public function mount(): void
    {
        $this->permissions = (new PermissionRepository())->getAll()->mapWithKeys(function ($permission) {
            return [$permission->id => ['name' => $permission->name, 'translation' => $permission->translation]];
        })->all();
    }

    /**
     * @throws Exception
     */
    public function create()
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new RoleCreateService($validatedData);
            $response = $service->callMethod();

            if ($response) {
                if ($this->dispatching) {
                    $this->dispatchForCreate('role', $this->form->name);
                    $this->form->reset();
                    $this->mount();
                } else {
                    return to_route('dashboard.user-management.roles.index');
                }
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.user-management.roles.create', [
            'permissions' => $this->permissions,
        ]);
    }
}
