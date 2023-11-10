<?php

namespace App\Livewire\UserManagement\Users;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Livewire\UserManagement\Users\Forms\UserUpdateForm;
use App\Repositories\Dashboard\UserManagement\Roles\RoleRepository;
use App\Contracts\Traits\Dashboard\Livewire\General\RemoveFileTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\ShowPasswordTrait;
use App\Services\Dashboard\UserManagement\Users\Update\UserUpdateService;

class Update extends Component
{
    use WithFileUploads;
    use ShowPasswordTrait, DispatchingTrait, RemoveFileTrait;

    public User $user;
    public UserUpdateForm $form;

    public function mount(): void
    {
        $this->form->setValues($this->user);
    }

    /**
     * @throws Exception
     */
    public function update()
    {
        $validatedData = $this->validate();
        if ($validatedData) {
            $service = new UserUpdateService($validatedData, $this->user);
            $response = $service->callMethod();

            if ($response) {
                if ($this->dispatching) {
                    $this->dispatchSuccess('fa fa-pen text-info', 'updated-successfully', "<b>User updated:</b> {$this->form->name}");
                } else {
                    return to_route('dashboard.user-management.users.index');
                }
            } else {
                throw $response;
            }
        }
    }

    public function render(RoleRepository $repository): View
    {
        return view('livewire.user-management.users.update', [
            'roles' => $repository->getAll(),
        ]);
    }
}
