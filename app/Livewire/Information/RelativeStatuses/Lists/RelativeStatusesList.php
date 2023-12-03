<?php

namespace App\Livewire\Information\RelativeStatuses\Lists;

use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\SortingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\SearchingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\PaginatingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\WithTrashedTrait;
use App\Repositories\Dashboard\Information\RelativeStatuses\RelativeStatusRepository;

class RelativeStatusesList extends Component
{
    use SearchingTrait, PaginatingTrait, WithTrashedTrait, SortingTrait;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(RelativeStatusRepository $relativeStatusesRepository): View
    {
        return view('livewire.information.relative-statuses.lists.relative-statuses-list', [
            'relativeStatuses' => $relativeStatusesRepository->getFiltered($this->search, $this->perPage, $this->with_trashed, $this->orderBy, $this->orderDirection),
        ]);
    }
}
