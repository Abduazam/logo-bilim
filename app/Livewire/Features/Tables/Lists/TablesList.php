<?php

namespace App\Livewire\Features\Tables\Lists;

use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\SortingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\SearchingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\PaginatingTrait;
use App\Repositories\Dashboard\Features\TableColumns\Tables\TableRepository;

class TablesList extends Component
{
    use SearchingTrait, PaginatingTrait, SortingTrait;

    public function render(TableRepository $repository): View
    {
        return view('livewire.features.tables.lists.tables-list', [
            'tables' => $repository->getFiltered($this->search, $this->perPage, $this->orderBy, $this->orderDirection),
        ]);
    }
}
