<?php

namespace App\Livewire\Information\Branches\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;

class BranchCreateForm extends Form
{
    #[Rule('required|string|min:2')]
    public string $title = '';
}
