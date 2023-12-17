<?php

namespace App\Livewire\Management\Appointments;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Livewire\Management\Appointments\Forms\RescheduleAppointmentForm;
use App\Repositories\Dashboard\Management\Appointments\Reschedule\AppointmentRescheduleRepository;
use App\Services\Dashboard\Management\Appointments\Appointment\Reschedule\AppointmentRescheduleService;

class Reschedule extends Component
{
    use DispatchingTrait;

    public Appointment $appointment;
    public RescheduleAppointmentForm $form;

    public function mount(): void
    {
        $this->form->setValues($this->appointment);
    }

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
                $this->dispatchSuccess('fa fa-clock-rotate-left text-info', 'updated-successfully', "<b>Appointment rescheduled:</b> {$time} => {$this->form->start_time}");
            } else {
                throw $response;
            }
        }
    }

    #[On('updated')]
    public function render(AppointmentRescheduleRepository $rescheduleAppointmentRepository): View
    {
        return view('livewire.management.appointments.reschedule', [
            'times' => $rescheduleAppointmentRepository->getHours($this->appointment),
        ]);
    }
}
