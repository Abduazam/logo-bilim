<?php

namespace App\Livewire\UserManagement\Users\Lists;

use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\SortingTrait;
use App\Repositories\Dashboard\UserManagement\Roles\RoleRepository;
use App\Repositories\Dashboard\UserManagement\Users\UserRepository;
use App\Contracts\Traits\Dashboard\Livewire\General\SearchingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\PaginatingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\WithTrashedTrait;

class UsersList extends Component
{
    use SearchingTrait, PaginatingTrait, WithTrashedTrait, SortingTrait;

    public int $role_id = 0;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(UserRepository $repository, RoleRepository $roleRepository): View
    {
        return view('livewire.user-management.users.lists.users-list', [
            'users' => $repository->getFiltered($this->search, $this->perPage, $this->with_trashed, $this->orderBy, $this->orderDirection, $this->role_id),
            'roles' => $roleRepository->getAll(),
        ]);
    }
}
