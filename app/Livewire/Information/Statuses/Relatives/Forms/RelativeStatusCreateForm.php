<?php

namespace App\Livewire\Information\Statuses\Relatives\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class RelativeStatusCreateForm extends Form
{
    #[Validate('required|string|min:2')]
    public ?string $title = null;
}
