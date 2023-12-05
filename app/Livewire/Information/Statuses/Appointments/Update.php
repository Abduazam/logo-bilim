<?php

namespace App\Livewire\Information\Statuses\Appointments;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Models\Dashboard\Information\AppointmentStatuses\AppointmentStatus;
use App\Livewire\Information\Statuses\Appointments\Forms\AppointmentStatusUpdateForm;
use App\Services\Dashboard\Information\AppointmentStatuses\Update\AppointmentStatusUpdateService;

class Update extends Component
{
    use DispatchingTrait;

    public AppointmentStatus $appointmentStatus;
    public AppointmentStatusUpdateForm $form;

    public function mount(): void
    {
        $this->form->setValues($this->appointmentStatus);
    }

    /**
     * @throws Exception
     */
    public function update(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new AppointmentStatusUpdateService($validatedData, $this->appointmentStatus);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatchMany(['refresh', 'updated']);
                $this->dispatchSuccess('fa fa-pen text-info', 'updated-successfully', "<b>Appointment status updated:</b><br>{$this->appointmentStatus->translation->translation} => {$this->form->translations[app()->getLocale()]}");
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.information.statuses.appointments.update');
    }
}
