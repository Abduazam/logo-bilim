<?php

namespace App\Livewire\Features\Languages;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\Livewire\General\SearchTrait;
use App\Repositories\Features\Languages\LanguageRepository;
use App\Traits\Livewire\Models\Features\Languages\ActionsTrait;
use App\Traits\Livewire\Models\Features\Languages\ColumnsTrait;
use App\Contracts\Interfaces\Traits\Livewire\Models\ColumnsInterface;
use App\Contracts\Interfaces\Traits\Livewire\Models\ActionsInterface;

class Index extends Component implements ActionsInterface, ColumnsInterface
{
    use SearchTrait, ColumnsTrait, ActionsTrait;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(LanguageRepository $repository): View
    {
        return view('livewire.features.languages.index', [
            'languages' => $repository->getFiltered($this->getColumnKeys(), $this->search),
        ]);
    }
}
