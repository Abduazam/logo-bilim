<?php

namespace App\Livewire\Information\Branches\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class BranchCreateForm extends Form
{
    #[Validate('required|string|min:2|unique:branches')]
    public string $title = '';
}
