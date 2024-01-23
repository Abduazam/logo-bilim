<?php

namespace App\Livewire\Management\Appointments;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Livewire\Management\Appointments\Forms\RescheduleAppointmentForm;
use App\Livewire\Management\Appointments\Traits\ActionOnAppointmentReschedule;
use App\Services\Dashboard\Management\Appointments\Appointment\Reschedule\AppointmentRescheduleService;

class Reschedule extends Component
{
    use DispatchingTrait, ActionOnAppointmentReschedule;

    public Appointment $appointment;
    public RescheduleAppointmentForm $form;

    /**
     * @throws Exception
     */
    public function reschedule(): void
    {
        $validatedData = $this->form->validate();
        if ($validatedData) {
            $time = date('H:s', strtotime($this->appointment->start_time));

            $service = new AppointmentRescheduleService($validatedData, $this->appointment);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatchMany(['refresh', 'updated']);
                $this->dispatchForReschedule('appointment', '<br>' . $this->appointment->created_date . ' => ' . $this->form->date . '<br>' . $time . ' => ' . $this->form->start_time);
            } else {
                throw $response;
            }
        }
    }

    #[On('updated')]
    public function render(): View
    {
        return view('livewire.management.appointments.reschedule');
    }
}
