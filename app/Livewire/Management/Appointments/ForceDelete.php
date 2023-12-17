<?php

namespace App\Livewire\Management\Appointments;

use Exception;
use Illuminate\View\View;
use Livewire\Component;
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
            $this->dispatchSuccess('fa fa-trash text-danger', 'force-deleted-successfully', "<b>Appoitment deleted:</b> {$this->appointment->id}");
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.management.appointments.force-delete');
    }
}
