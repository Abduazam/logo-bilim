<?php

namespace App\Livewire\Information\Types\Payments\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\Information\PaymentTypes\PaymentType;
use App\Helpers\Services\Livewire\Translations\GetExistingTranslations;

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
