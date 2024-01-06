<?php

namespace App\Livewire\Information\Statuses\Appointments;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;
use App\Services\Dashboard\Information\Statuses\Appointments\Restore\AppointmentStatusRestoreService;

class Restore extends Component
{
    use DispatchingTrait;

    public AppointmentStatus $appointmentStatus;

    /**
     * @throws Exception
     */
    public function restore(): void
    {
        $service = new AppointmentStatusRestoreService($this->appointmentStatus);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-rotate-left text-primary', 'restored-successfully', "<b>Appointment status restored:</b> {$this->appointmentStatus->title}");
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.information.statuses.appointments.restore');
    }
}
