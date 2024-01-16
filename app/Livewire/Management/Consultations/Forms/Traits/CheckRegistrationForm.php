<?php

namespace App\Livewire\Management\Consultations\Forms\Traits;

trait CheckRegistrationForm
{
    public function checkRegistrationFormTrue(): void
    {
        $bookingForm = $this->validateBooking();

        $paymentForm = $this->validatePayment();

        $clientForm = $this->validateClient();

        $this->registrationForm = $bookingForm && $paymentForm && $clientForm;
    }
}
