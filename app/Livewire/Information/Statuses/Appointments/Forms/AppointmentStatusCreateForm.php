<?php

namespace App\Livewire\Information\Statuses\Appointments\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class AppointmentStatusCreateForm extends Form
{
    #[Validate([
        'translations' => 'required|array',
        'translations.*' => 'required|string|min:2',
    ], as: [
        'translations' => 'appointment status',
        'translations.*' => 'appointment status',
    ])]
    public array $translations = [];
}
