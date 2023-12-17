<?php

namespace App\Livewire\Management\Appointments\Forms\Components;

use Livewire\Form;
use App\Livewire\Management\Appointments\Forms\Traits\PaymentsForm;
use App\Livewire\Management\Appointments\Forms\Traits\RegistrationForm;

class CreateInSideForm extends Form
{
    use RegistrationForm, PaymentsForm;

    public string $activeSection = 'registration';
}
