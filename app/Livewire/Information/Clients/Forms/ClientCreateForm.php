<?php

namespace App\Livewire\Information\Clients\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class ClientCreateForm extends Form
{
    #[Validate('required|string|min:3|max:75')]
    public ?string $first_name = null;

    #[Validate('nullable|string|min:3|max:75')]
    public ?string $last_name = null;

    #[Validate('required|date', as: 'date of birth')]
    public ?string $dob = null;

    #[Validate('nullable|image|mimes:jpg,jpeg,png,gif|max:5120')]
    public mixed $photo = null;

    #[Validate([
        'relatives' => 'nullable|array',
        'relatives.*' => 'array',
        'relatives.*.fullname' => ['required', 'string', 'min:3', 'max:100'],
        'relatives.*.phone_number' => 'required|numeric|digits_between:9,15',
        'relatives.*.relative_status_id' => 'required|numeric|exists:relative_statuses,id',
    ], as: [
        'relatives.*.fullname' => 'fullname',
        'relatives.*.phone_number' => 'phone number',
        'relatives.*.relative_status_id' => 'relative',
    ])]
    public array $relatives = [];
}
