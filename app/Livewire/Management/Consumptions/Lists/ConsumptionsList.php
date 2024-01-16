<?php

namespace App\Livewire\Management\Consumptions\Lists;

use Livewire\Component;
use Illuminate\View\View;
use App\Repositories\Dashboard\Management\Consumptions\ConsumptionRepository;

class ConsumptionsList extends Component
{
    protected $listeners = ['refresh' => '$refresh'];

    public function render(ConsumptionRepository $consumptionRepository): View
    {
        return view('livewire.management.consumptions.lists.consumptions-list', [
            'consumptions' => $consumptionRepository->getFiltered(),
        ]);
    }
}
