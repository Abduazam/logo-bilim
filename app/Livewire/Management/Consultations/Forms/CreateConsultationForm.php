<?php

namespace App\Livewire\Management\Consultations\Forms;

use Livewire\Form;
use App\Livewire\Management\Consultations\Forms\Traits\BookingForm;
use App\Livewire\Management\Consultations\Forms\Traits\ClientsForm;
use App\Livewire\Management\Consultations\Forms\Traits\PaymentsForm;
use App\Livewire\Management\Consultations\Forms\Traits\CheckRegistrationForm;

class CreateConsultationForm extends Form
{
    use ClientsForm, PaymentsForm, BookingForm, CheckRegistrationForm;

    public bool $registrationForm = false;
}
