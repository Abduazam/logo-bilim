<?php

namespace App\Livewire\Information\Clients\Lists;

use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\SortingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\SearchingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\PaginatingTrait;
use App\Repositories\Dashboard\Information\Clients\ClientRepository;
use App\Contracts\Traits\Dashboard\Livewire\General\WithTrashedTrait;

class ClientsList extends Component
{
    use SearchingTrait, PaginatingTrait, WithTrashedTrait, SortingTrait;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(ClientRepository $clientRepository): View
    {
        return view('livewire.information.clients.lists.clients-list', [
            'clients' => $clientRepository->getFiltered($this->search, $this->perPage, $this->with_trashed, $this->orderBy, $this->orderDirection),
        ]);
    }
}
