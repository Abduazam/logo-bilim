<?php

namespace App\Livewire\UserManagement\Users;

use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\RemoveFileTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\ShowPasswordTrait;
use App\Contracts\Traits\Dashboard\Livewire\Models\AssigningBranch;
use App\Livewire\UserManagement\Users\Forms\UserUpdateForm;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Repositories\Dashboard\Information\Branches\BranchRepository;
use App\Repositories\Dashboard\UserManagement\Roles\RoleRepository;
use App\Services\Dashboard\UserManagement\Users\Update\UserUpdateService;
use Exception;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    use ShowPasswordTrait, DispatchingTrait, RemoveFileTrait, AssigningBranch;

    public User $user;
    public UserUpdateForm $form;

    public function mount(BranchRepository $branchRepository): void
    {
        $this->branches = $branchRepository->getNotChosenAll($this->user)->pluck('title', 'id')->all();
        $this->form->setValues($this->user);
    }

    /**
     * @throws Exception
     */
    public function update()
    {
        $validatedData = $this->form->validate();

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

    public function render(RoleRepository $roleRepository): View
    {
        return view('livewire.user-management.users.update', [
            'roles' => $roleRepository->getAll(),
            'branches' => $this->branches,
        ]);
    }
}
