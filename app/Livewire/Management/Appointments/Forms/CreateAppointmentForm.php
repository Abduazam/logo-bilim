<?php

namespace App\Livewire\Management\Appointments\Forms;

use Livewire\Form;
use App\Livewire\Management\Appointments\Forms\Traits\ClientsForm;
use App\Livewire\Management\Appointments\Forms\Traits\PaymentsForm;
use App\Livewire\Management\Appointments\Forms\Traits\CreateRegistrationForm;

class CreateAppointmentForm extends Form
{
    use CreateRegistrationForm, ClientsForm, PaymentsForm;

    public string $activeSection = 'registration';
}
