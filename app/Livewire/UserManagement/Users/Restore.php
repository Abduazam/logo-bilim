<?php

namespace App\Livewire\UserManagement\Users;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\UserManagement\Users\Restore\UserRestoreService;

class Restore extends Component
{
    use DispatchingTrait;

    public User $user;

    /**
     * @throws Exception
     */
    public function restore(): void
    {
        $service = new UserRestoreService($this->user);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchForRestore('user', $this->user->name);
        } else {
            throw $response;
        }
    }
    public function render(): View
    {
        return view('livewire.user-management.users.restore');
    }
}
