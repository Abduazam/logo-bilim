<?php

namespace App\Livewire\UserManagement\Users;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\UserManagement\Users\Delete\UserDeleteService;

class Delete extends Component
{
    use DispatchingTrait;

    public User $user;

    /**
     * @throws Exception
     */
    public function delete(): void
    {
        $service = new UserDeleteService($this->user);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-trash text-danger', 'deleted-successfully', "<b>User deleted:</b> {$this->user->name}");
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.user-management.users.delete');
    }
}
