<?php

namespace App\Livewire\UserManagement\Users;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\UserManagement\Users\ForceDelete\UserForceDeleteService;

class ForceDelete extends Component
{
    use DispatchingTrait;

    public User $user;

    /**
     * @throws Exception
     */
    public function forceDelete(): void
    {
        $service = new UserForceDeleteService($this->user);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchForForceDelete('user', $this->user->name);
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.user-management.users.force-delete');
    }
}
