<?php

namespace App\Livewire\Information\Statuses\Appointments;

use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;
use App\Services\Dashboard\Information\Statuses\AppointmentStatuses\Delete\AppointmentStatusDeleteService;
use Exception;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    use DispatchingTrait;

    public AppointmentStatus $appointmentStatus;

    /**
     * @throws Exception
     */
    public function delete(): void
    {
        $service = new AppointmentStatusDeleteService($this->appointmentStatus);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-trash text-danger', 'deleted-successfully', "<b>Appointment status deleted:</b> {$this->appointmentStatus->translation->translation}");
        } else {
            throw $response;
        }
    }

    #[On('updated')]
    public function render(): View
    {
        return view('livewire.information.statuses.appointments.delete');
    }
}
