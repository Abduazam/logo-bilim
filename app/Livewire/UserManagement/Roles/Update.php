<?php

namespace App\Livewire\UserManagement\Roles;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\UserManagement\Roles\Role;
use App\Livewire\UserManagement\Roles\Forms\RoleUpdateForm;
use App\Livewire\UserManagement\Roles\Traits\ActionOnPermissions;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\UserManagement\Roles\Update\RoleUpdateService;
use App\Repositories\Dashboard\UserManagement\Permissions\PermissionRepository;

class Update extends Component
{
    use DispatchingTrait, ActionOnPermissions;

    public Role $role;
    public RoleUpdateForm $form;

    public function mount(PermissionRepository $repository): void
    {
        $this->permissions = $repository->getNotChosenAll($this->role)->pluck('name', 'id')->all();
        $this->form->setValues($this->role);
    }

    /**
     * @throws Exception
     */
    public function update()
    {
        $validatedData = $this->validate();
        if ($validatedData) {
            $service = new RoleUpdateService($validatedData, $this->role);
            $response = $service->callMethod();

            if ($response) {
                if ($this->dispatching) {
                    $this->dispatchSuccess('fa fa-pen text-info', 'updated-successfully', "<b>Role updated</b>: {$this->form->name}");
                    $this->mount(new PermissionRepository());
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
        return view('livewire.user-management.roles.update', [
            'permissions' => $this->permissions,
        ]);
    }
}