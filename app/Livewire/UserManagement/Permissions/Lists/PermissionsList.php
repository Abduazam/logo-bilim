<?php

namespace App\Livewire\UserManagement\Permissions\Lists;

use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\SortingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\SearchingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\PaginatingTrait;
use App\Repositories\Dashboard\UserManagement\Permissions\PermissionRepository;

class PermissionsList extends Component
{
    use SearchingTrait, PaginatingTrait, SortingTrait;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(PermissionRepository $permissionRepository): View
    {
        return view('livewire.user-management.permissions.lists.permissions-list', [
            'permissions' => $permissionRepository->getFiltered($this->search, $this->perPage, $this->orderBy, $this->orderDirection),
        ]);
    }
}
