<?php

namespace App\Livewire\Information\Branches\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\Information\Branches\Branch;

class BranchUpdateForm extends Form
{
    #[Validate('required|string|min:2', as: 'dashboard.fields.title', translate: true)]
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

    public function setValues(Branch $branch): void
    {
        $this->title = $branch->title;
        $chosenServices = [];
        $branch->services()->withPivot('price')->each(function ($service) use (&$chosenServices) {
            $chosenServices[$service->id] = [
                'title' => $service->title,
                'price' => $service->pivot->price ?? null,
            ];
        });
        $this->chosen_services = $chosenServices;
    }
}
