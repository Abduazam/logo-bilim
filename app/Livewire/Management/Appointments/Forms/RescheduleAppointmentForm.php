<?php

namespace App\Livewire\Management\Appointments\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\Management\Appointments\Appointment;

class RescheduleAppointmentForm extends Form
{
    #[Validate('required|date')]
    public mixed $date;

    #[Validate('required')]
    public ?string $start_time = null;

    public function setValues(Appointment $appointment): void
    {
        $this->date = $appointment->created_date;
    }
}
