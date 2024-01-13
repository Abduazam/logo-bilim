<?php

namespace App\Livewire\Management\Consultations\Lists;

use Livewire\Component;
use Illuminate\View\View;
use App\Repositories\Dashboard\Management\Consultations\ConsultationRepository;

class ConsultationsList extends Component
{
    protected $listeners = ['refresh' => '$refresh'];

    public function render(ConsultationRepository $consultationRepository): View
    {
        return view('livewire.management.consultations.lists.consultations-list', [
            'consultations' => $consultationRepository->getFiltered(),
        ]);
    }
}
