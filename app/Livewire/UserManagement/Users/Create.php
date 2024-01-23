<?php

namespace App\Livewire\UserManagement\Users;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Livewire\UserManagement\Users\Forms\UserCreateForm;
use App\Contracts\Traits\Dashboard\Livewire\Models\AssigningBranch;
use App\Repositories\Dashboard\UserManagement\Roles\RoleRepository;
use App\Contracts\Traits\Dashboard\Livewire\General\RemoveFileTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Repositories\Dashboard\Information\Branches\BranchRepository;
use App\Contracts\Traits\Dashboard\Livewire\General\ShowPasswordTrait;
use App\Services\Dashboard\UserManagement\Users\Create\UserCreateService;

class Create extends Component
{
    use WithFileUploads;
    use ShowPasswordTrait, DispatchingTrait, RemoveFileTrait, AssigningBranch;

    public UserCreateForm $form;

    public function mount(): void
    {
        $this->branches = (new BranchRepository())->getAll()->pluck('title', 'id')->all();
    }

    /**
     * @throws Exception
     */
    public function create()
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new UserCreateService($validatedData);
            $response = $service->callMethod();

            if ($response) {
                if ($this->dispatching) {
                    $this->dispatchForCreate('user', $this->form->name);
                    $this->form->reset();
                    $this->mount();
                } else {
                    return to_route('dashboard.user-management.users.index');
                }
            } else {
                throw $response;
            }
        }
    }

    public function render(RoleRepository $roleRepository): View
    {
        return view('livewire.user-management.users.create', [
            'roles' => $roleRepository->getAll(),
            'branches' => $this->branches,
        ]);
    }
}
