<?php

namespace App\Livewire\Information\Statuses\Appointments\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;

class AppointmentStatusUpdateForm extends Form
{
    #[Validate('required|string|min:2')]
    public ?string $title = null;

    public function setValues(AppointmentStatus $appointmentStatus): void
    {
        $this->title = $appointmentStatus->title;
    }
}
