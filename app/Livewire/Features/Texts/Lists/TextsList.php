<?php

namespace App\Livewire\Features\Texts\Lists;

use Livewire\Component;
use Illuminate\View\View;
use App\Repositories\Dashboard\Features\Texts\TextRepository;
use App\Contracts\Traits\Dashboard\Livewire\General\SortingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\SearchingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\PaginatingTrait;

class TextsList extends Component
{
    use SearchingTrait, PaginatingTrait, SortingTrait;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(TextRepository $repository): View
    {
        return view('livewire.features.texts.lists.texts-list', [
            'texts' => $repository->getFiltered($this->search, $this->perPage, $this->orderBy, $this->orderDirection),
        ]);
    }
}
