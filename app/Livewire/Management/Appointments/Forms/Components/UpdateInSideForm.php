<?php

namespace App\Livewire\Management\Appointments\Forms\Components;

use Livewire\Form;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Livewire\Management\Appointments\Forms\Traits\PaymentsForm;
use App\Livewire\Management\Appointments\Forms\Traits\RegistrationForm;

class UpdateInSideForm extends Form
{
    use RegistrationForm, PaymentsForm;

    public string $activeSection = 'registration';

    public function setValues(Appointment $appointment): void
    {
        /**
         * Registration form filling.
         */
        $this->branch_id = $appointment->branch_id;
        $this->setServices();
        $this->service_id = $appointment->service_id;
        $this->setTeachers();
        $this->teacher_id = $appointment->teacher_id;
        $this->setTimes();
        $this->start_time = $appointment->getStartTime();
        $this->clients = $appointment->clients->map(function ($client) {
            return [
                'client_id' => $client->client_id,
                'info' => [
                    'first_name' => $client->client->first_name,
                    'last_name' => $client->client->last_name,
                    'dob' => $client->client->dob,
                    'relatives' => [],
                ],
            ];
        })->toArray();
        $this->checkRegistrationFormTrue();

        /**
         * Payments form filling.
         */
        $this->service_price = $appointment->service_price;
        $this->payments = $appointment->clients->map(function ($client) {
            return [
                'client_name' => $client->client->first_name,
                'payment_amount' => $client->payment_amount,
                'payment_type_id' => $client->payment_type_id,
                'teacher_salary' => $client->teacher_salary,
                'benefit' => $client->benefit,
            ];
        })->toArray();
        $this->checkPaymentsFormTrue();
    }
}
