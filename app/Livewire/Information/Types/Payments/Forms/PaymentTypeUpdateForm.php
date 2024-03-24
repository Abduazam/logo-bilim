<?php

namespace App\Livewire\Information\Types\Payments\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\Information\Types\Payments\PaymentType;

class PaymentTypeUpdateForm extends Form
{
    #[Validate('required|string|min:2', as: 'dashboard.fields.title', translate: true)]
    public ?string $title = null;

    public function setValues(PaymentType $paymentType): void
    {
        $this->title = $paymentType->title;
    }
}
