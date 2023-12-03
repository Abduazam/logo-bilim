<?php

namespace App\Livewire\Information\Branches\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class BranchCreateForm extends Form
{
    #[Validate('required|string|min:2|unique:branches')]
    public string $title = '';

    #[Validate([
        'chosen_services' => 'required|array',
        'chosen_services.*' => 'required|array',
        'chosen_services.*.title' => 'required|string',
        'chosen_services.*.price' => 'required|numeric',
    ], as: [
        'chosen_services' => 'services',
        'chosen_services.*.price' => 'price',
    ])]
    public array $chosen_services = [];
}
