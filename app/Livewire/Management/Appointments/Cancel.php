<?php

namespace App\Livewire\Management\Appointments;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Management\Appointments\Appointment\Cancel\AppointmentCancelService;

class Cancel extends Component
{
    use DispatchingTrait;

    public Appointment $appointment;

    /**
     * @throws Exception
     */
    public function cancel(): void
    {
        $service = new AppointmentCancelService($this->appointment);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchForCancel('appointment', $this->appointment->id);
        } else {
            throw $response;
        }
    }

    #[On('updated')]
    public function render(): View
    {
        return view('livewire.management.appointments.cancel');
    }
}
