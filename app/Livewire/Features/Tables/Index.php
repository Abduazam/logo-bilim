<?php

namespace App\Livewire\Features\Tables;

use App\Contracts\Traits\Dashboard\Livewire\General\PaginatingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\SearchingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\SortingTrait;
use App\Repositories\Dashboard\Features\TableColumns\Tables\TableRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;
use Livewire\Component;

class Index extends Component
{
    use SearchingTrait, PaginatingTrait, SortingTrait;

    public function render(TableRepository $repository): View
    {
        return view('livewire.features.tables.index', [
            'tables' => $repository->getFiltered($this->search, $this->perPage, $this->orderBy, $this->orderDirection),
            'columns' => $repository->getVisibleColumns('tables')
        ]);
    }
}
