<?php

namespace App\Livewire\Information\RelativeStatuses\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class RelativeStatusCreateForm extends Form
{
    #[Validate([
        'translations' => 'required|array',
        'translations.*' => 'required|string|min:2',
    ], as: [
        'translations' => 'relative name',
        'translations.*' => 'relative name',
    ])]
    public array $translations = [];
}
