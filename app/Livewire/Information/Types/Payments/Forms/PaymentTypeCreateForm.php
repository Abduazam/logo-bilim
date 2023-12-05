<?php

namespace App\Livewire\Information\Types\Payments\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class PaymentTypeCreateForm extends Form
{
    #[Validate([
        'translations' => 'required|array',
        'translations.*' => 'required|string|min:2',
    ], as: [
        'translations' => 'payment type',
        'translations.*' => 'payment type',
    ])]
    public array $translations = [];
}
