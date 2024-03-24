<?php

namespace App\Livewire\Information\Branches\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class BranchCreateForm extends Form
{
    #[Validate('required|string|min:2|unique:branches', as: 'dashboard.fields.title', translate: true)]
    public string $title = '';

    #[Validate([
        'chosen_services' => 'required|array',
        'chosen_services.*' => 'required|array',
        'chosen_services.*.title' => 'required|string',
        'chosen_services.*.price' => 'required|numeric',
    ], as: [
        'chosen_services' => 'dashboard.sections.service',
        'chosen_services.*.price' => 'dashboard.fields.price',
    ], translate: true)]
    public array $chosen_services = [];
}
