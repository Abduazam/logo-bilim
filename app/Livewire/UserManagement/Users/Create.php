<?php

namespace App\Livewire\UserManagement\Users;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Livewire\UserManagement\Users\Forms\UserCreateForm;
use App\Repositories\Dashboard\UserManagement\Roles\RoleRepository;
use App\Contracts\Traits\Dashboard\Livewire\General\RemoveFileTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\ShowPasswordTrait;
use App\Services\Dashboard\UserManagement\Users\Create\UserCreateService;

class Create extends Component
{
    use WithFileUploads;
    use ShowPasswordTrait, DispatchingTrait, RemoveFileTrait;

    public UserCreateForm $form;

    /**
     * @throws Exception
     */
    public function create()
    {
        $validatedData = $this->validate();
        if ($validatedData) {
            $service = new UserCreateService($validatedData);
            $response = $service->callMethod();

            if ($response) {
                if ($this->dispatching) {
                    $this->dispatchSuccess('fa fa-check text-success', 'created-successfully', "<b>New user:</b> {$this->form->name}");
                    $this->form->reset();
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
        return view('livewire.user-management.users.create', [
            'roles' => $repository->getAll(),
        ]);
    }
}
