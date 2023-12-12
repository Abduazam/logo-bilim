<?php

namespace App\Livewire\Management\Appointments\Forms\Components;

use Livewire\Form;
use App\Livewire\Management\Appointments\Components\Traits\ClientTrait;
use App\Livewire\Management\Appointments\Components\Traits\AppointmentTrait;

class CreateInSideForm extends Form
{
    use AppointmentTrait, ClientTrait;

    public string $activeSection = 'appointment';
}
