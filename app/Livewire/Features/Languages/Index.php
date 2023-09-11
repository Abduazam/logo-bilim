<?php

namespace App\Livewire\Features\Languages;

use App\Contracts\Interfaces\Repositories\GetObjectFromDataInterface;
use Livewire\Component;
use Illuminate\View\View;
use App\Traits\Livewire\General\SearchTrait;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Traits\Livewire\General\PaginationTrait;
use App\Traits\Livewire\General\WithTrashedTrait;
use App\Repositories\Features\Languages\LanguageRepository;
use App\Traits\Livewire\Models\Features\Languages\ActionsTrait;
use App\Traits\Livewire\Models\Features\Languages\ColumnsTrait;
use App\Contracts\Interfaces\Traits\Livewire\Models\ColumnsInterface;
use App\Contracts\Interfaces\Traits\Livewire\Models\ActionsInterface;

class Index extends Component implements ActionsInterface, ColumnsInterface, GetObjectFromDataInterface
{
    use SearchTrait, WithTrashedTrait, PaginationTrait, ColumnsTrait, ActionsTrait;

    protected $listeners = ['refresh' => '$refresh'];

    public function getObjectFromData($data)
    {
        if ($data instanceof LengthAwarePaginator) {
            return $data->items();
        }

        return $data;
    }

    public function render(LanguageRepository $repository): View
    {
        return view('livewire.features.languages.index', [
            'languages' => $repository->getFiltered($this->getColumnKeys(), $this->getSearchableKeys(), $this->search, $this->with_trashed, $this->perPage),
        ]);
    }
}
