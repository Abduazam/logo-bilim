<?php

namespace App\Livewire\Management\Consultations\Forms\Traits;

use Livewire\Attributes\Validate;

trait PaymentsForm
{
    #[Validate([
        'payments' => 'required|array',
        'payments.client_name' => 'required|string|min:3',
        'payments.payment_amount' => 'required|numeric',
        'payments.payment_type_id' => 'required|numeric|exists:payment_types,id',
    ], as: [
        'payments.client_name' => 'client name',
        'payments.payment_amount' => 'payment amount',
        'payments.payment_type_id' => 'payment type',
    ])]
    public array $payments = [
        'client_name' => null,
        'payment_amount' => null,
        'payment_type_id' => null,
    ];

    public function setClientName(): void
    {
        $this->payments['client_name'] = $this->clients['info']['first_name'];
    }

    public function validatePayment(): bool
    {
        $requiredFields = [
            $this->payments['client_name'],
            $this->payments['payment_amount'],
            $this->payments['payment_type_id'],
        ];

        return !in_array(null, $requiredFields, true);
    }
}
