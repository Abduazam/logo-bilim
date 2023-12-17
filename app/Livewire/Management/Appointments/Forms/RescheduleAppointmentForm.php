<?php

namespace App\Livewire\Management\Appointments\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\Management\Appointments\Appointment;

class RescheduleAppointmentForm extends Form
{
    #[Validate('required')]
    public string $start_time;

    public function setValues(Appointment $appointment): void
    {
        $this->start_time = $appointment->getStartTime();
    }
}
