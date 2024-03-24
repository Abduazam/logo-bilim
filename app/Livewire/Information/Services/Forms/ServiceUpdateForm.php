<?php

namespace App\Livewire\Information\Services\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\Information\Services\Service;

class ServiceUpdateForm extends Form
{
    #[Validate('required|string|min:2', as: 'dashboard.fields.title', translate: true)]
    public string $title = '';

    public function setValues(Service $service): void
    {
        $this->title = $service->title;
    }
}
