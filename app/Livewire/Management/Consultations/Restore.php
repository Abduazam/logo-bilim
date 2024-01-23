<?php

namespace App\Livewire\Management\Consultations;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;
use App\Models\Dashboard\Management\Consultations\Consultation;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Management\Consultations\Restore\ConsultationRestoreService;

class Restore extends Component
{
    use DispatchingTrait;

    public Consultation $consultation;

    /**
     * @throws Exception
     */
    public function restore(): void
    {
        $service = new ConsultationRestoreService($this->consultation);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchForRestore('consultation', $this->consultation->id);
        } else {
            throw $response;
        }
    }

    #[On('updated')]
    public function render(): View
    {
        return view('livewire.management.consultations.restore');
    }
}
