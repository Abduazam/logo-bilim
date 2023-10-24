<?php

namespace App\Livewire\Features\Languages;

use Livewire\Component;
use Illuminate\View\View;
use App\Helpers\Services\ColumnsService\getColumnsService;
use App\Contracts\Traits\Dashboard\Livewire\General\SortingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\SearchingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\PaginatingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\WithTrashedTrait;
use App\Repositories\Dashboard\Features\Languages\LanguageRepository;

class Index extends Component
{
    use SearchingTrait, PaginatingTrait, WithTrashedTrait, SortingTrait;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(LanguageRepository $repository, getColumnsService $service): View
    {
        return view('livewire.features.languages.index', [
            'languages' => $repository->getFiltered($this->search, $this->perPage, $this->with_trashed, $this->orderBy, $this->orderDirection),
            'columns' => $service->getVisibleColumns('languages'),
        ]);
    }
}
