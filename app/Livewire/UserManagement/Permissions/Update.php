<?php

namespace App\Livewire\UserManagement\Permissions;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\UserManagement\Permissions\Permission;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Livewire\UserManagement\Permissions\Forms\PermissionUpdateForm;
use App\Services\Dashboard\UserManagement\Permissions\Update\PermissionUpdateService;

class Update extends Component
{
    use DispatchingTrait;

    public Permission $permission;
    public PermissionUpdateForm $form;

    public function mount(): void
    {
        $this->form->setValues($this->permission);
    }

    /**
     * @throws Exception
     */
    public function update(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new PermissionUpdateService($validatedData, $this->permission);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatch('refresh');
                $this->dispatchSuccess('fa fa-pen text-info', 'updated-successfully', "<b>Permission updated:</b> {$this->permission->name}");
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.user-management.permissions.update');
    }
}
