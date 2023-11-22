<?php

namespace App\Livewire\Information\Branches\Lists;

use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\SortingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\SearchingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\PaginatingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\WithTrashedTrait;
use App\Repositories\Dashboard\Information\Branches\BranchRepository;

class BranchesList extends Component
{
    use SearchingTrait, PaginatingTrait, WithTrashedTrait, SortingTrait;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(BranchRepository $branchRepository): View
    {
        return view('livewire.information.branches.lists.branches-list', [
            'branches' => $branchRepository->getFiltered($this->search, $this->perPage, $this->with_trashed, $this->orderBy, $this->orderDirection),
        ]);
    }
}
