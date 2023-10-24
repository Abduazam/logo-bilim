<?php

namespace App\Livewire\Features\Tables;

use Livewire\Component;
use Illuminate\View\View;
use App\Helpers\Services\ColumnsService\getColumnsService;
use App\Contracts\Traits\Dashboard\Livewire\General\SortingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\SearchingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\PaginatingTrait;
use App\Repositories\Dashboard\Features\TableColumns\Tables\TableRepository;

class Index extends Component
{
    use SearchingTrait, PaginatingTrait, SortingTrait;

    public function render(TableRepository $repository, getColumnsService $service): View
    {
        return view('livewire.features.tables.index', [
            'tables' => $repository->getFiltered($this->search, $this->perPage, $this->orderBy, $this->orderDirection),
            'columns' => $service->getVisibleColumns('tables')
        ]);
    }
}
