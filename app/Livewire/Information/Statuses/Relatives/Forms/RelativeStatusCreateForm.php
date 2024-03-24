<?php

namespace App\Livewire\Information\Statuses\Relatives\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class RelativeStatusCreateForm extends Form
{
    #[Validate('required|string|min:2', as: 'dashboard.fields.title', translate: true)]
    public ?string $title = null;
}
