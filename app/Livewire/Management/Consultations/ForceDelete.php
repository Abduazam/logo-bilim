<?php

namespace App\Livewire\Management\Consultations;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Management\Consultations\Consultation;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Management\Consultations\ForceDelete\ConsultationForceDeleteService;

class ForceDelete extends Component
{
    use DispatchingTrait;

    public Consultation $consultation;

    /**
     * @throws Exception
     */
    public function forceDelete(): void
    {
        $service = new ConsultationForceDeleteService($this->consultation);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchForForceDelete('consultation', $this->consultation->id);
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.management.consultations.force-delete');
    }
}
