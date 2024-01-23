<?php

namespace App\Livewire\Management\Appointments;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Management\Appointments\Appointment\ForceDelete\AppointmentForceDeleteService;

class ForceDelete extends Component
{
    use DispatchingTrait;

    public Appointment $appointment;

    /**
     * @throws Exception
     */
    public function forceDelete(): void
    {
        $service = new AppointmentForceDeleteService($this->appointment);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchForForceDelete('appointment', $this->appointment->id);
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.management.appointments.force-delete');
    }
}
