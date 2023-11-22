<?php

namespace App\Livewire\Information\Services\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class ServiceCreateForm extends Form
{
    #[Validate('required|string|min:2|unique:services')]
    public string $title = '';
}
