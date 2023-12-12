<?php

namespace App\Livewire\Information\Types\Payments\Forms;

use App\Helpers\Services\Livewire\Translations\GetExistingTranslations;
use App\Models\Dashboard\Information\Types\Payments\PaymentType;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PaymentTypeUpdateForm extends Form
{
    #[Validate([
        'translations' => 'required|array',
        'translations.*' => 'required|string|min:2',
    ], as: [
        'translations' => 'payment type',
        'translations.*' => 'payment type',
    ])]
    public array $translations = [];

    public function setValues(PaymentType $paymentType): void
    {
        $translations = new GetExistingTranslations();
        $this->translations = $translations->getExistingTranslations($paymentType);
    }
}
