<?php

namespace App\Livewire\Information\Clients\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\Information\Clients\Client;

class ClientUpdateForm extends Form
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
        'relatives.*.relative_id' => 'nullable|numeric|exists:client_relatives,id',
        'relatives.*.fullname' => 'required|string|min:3|max:100',
        'relatives.*.phone_number' => 'required|numeric|digits_between:9,15',
        'relatives.*.relative_status_id' => 'required|numeric|exists:relative_statuses,id',
    ], as: [
        'relatives.*.fullname' => 'fullname',
        'relatives.*.phone_number' => 'phone number',
        'relatives.*.relative_status_id' => 'relative',
    ])]
    public array $relatives = [];

    public function setValues(Client $client): void
    {
        $this->first_name = $client->first_name;
        $this->last_name = $client->last_name;
        $this->dob = $client->dob;
        $this->photo = $client->photo;
        $this->relatives = $client->relatives->map(function ($relative) {
            return [
                'relative_id' => $relative->id,
                'fullname' => $relative->fullname,
                'phone_number' => $relative->phone_number,
                'relative_status_id' => $relative->relative_status_id,
            ];
        })->toArray();
    }
}
