<?php

namespace App\Livewire\Information\Statuses\Appointments\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class AppointmentStatusCreateForm extends Form
{
    #[Validate('required|string|min:2')]
    public ?string $title = null;
}
