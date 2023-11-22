<?php

namespace App\Livewire\Features\Languages\Lists;

use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\SortingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\SearchingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\PaginatingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\WithTrashedTrait;
use App\Repositories\Dashboard\Features\Languages\LanguageRepository;

class LanguagesList extends Component
{
    use SearchingTrait, PaginatingTrait, WithTrashedTrait, SortingTrait;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(LanguageRepository $languageRepository): View
    {
        return view('livewire.features.languages.lists.languages-list', [
            'languages' => $languageRepository->getFiltered($this->search, $this->perPage, $this->with_trashed, $this->orderBy, $this->orderDirection),
        ]);
    }
}
