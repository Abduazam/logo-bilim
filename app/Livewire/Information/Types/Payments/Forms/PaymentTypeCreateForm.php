<?php

namespace App\Livewire\Information\Types\Payments\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class PaymentTypeCreateForm extends Form
{
    #[Validate('required|string|min:2')]
    public ?string $title = null;
}
