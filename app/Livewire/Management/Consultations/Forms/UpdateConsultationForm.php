<?php

namespace App\Livewire\Management\Consultations\Forms;

use Livewire\Form;
use App\Models\Dashboard\Management\Consultations\Consultation;
use App\Livewire\Management\Consultations\Forms\Traits\BookingForm;
use App\Livewire\Management\Consultations\Forms\Traits\ClientsForm;
use App\Livewire\Management\Consultations\Forms\Traits\PaymentsForm;
use App\Livewire\Management\Consultations\Forms\Traits\CheckRegistrationForm;

class UpdateConsultationForm extends Form
{
    use ClientsForm, PaymentsForm, BookingForm, CheckRegistrationForm;

    public bool $registrationForm = true;

    public function setValues(Consultation $consultation): void
    {
        $this->clients['client_id'] = $consultation->client_id;
        $this->clients['info']['first_name'] = $consultation->client->first_name;
        $this->clients['info']['last_name'] = $consultation->client->last_name;
        $this->clients['info']['dob'] = $consultation->client->dob;

        $this->payments['client_name'] = $consultation->client->first_name;
        $this->payments['payment_amount'] = $consultation->payment_amount;
        $this->payments['payment_type_id'] = $consultation->payment_type_id;

        $this->created_date = $consultation->created_date;
        $this->start_time = $consultation->start_time;
        $this->end_time = $consultation->end_time;
        $this->setStartTimes();
        $this->setEndTimes();
    }
}
