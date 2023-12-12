<?php

namespace App\Livewire\Information\Statuses\Appointments;

use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;
use App\Services\Dashboard\Information\Statuses\AppointmentStatuses\ForceDelete\AppointmentStatusForceDeleteService;
use Exception;
use Illuminate\View\View;
use Livewire\Component;

class ForceDelete extends Component
{
    use DispatchingTrait;

    public AppointmentStatus $appointmentStatus;

    /**
     * @throws Exception
     */
    public function forceDelete(): void
    {
        $service = new AppointmentStatusForceDeleteService($this->appointmentStatus);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-trash text-danger', 'force-deleted-successfully', "<b>Appointment status completely deleted:</b> {$this->appointmentStatus->translation->translation}");
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.information.statuses.appointments.force-delete');
    }
}
