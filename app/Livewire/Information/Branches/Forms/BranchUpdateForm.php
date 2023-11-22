<?php

namespace App\Livewire\Information\Branches\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\Information\Branches\Branch;

class BranchUpdateForm extends Form
{
    #[Validate('required|string|min:2')]
    public string $title = '';

    public function setValues(Branch $branch): void
    {
        $this->title = $branch->title;
    }
}
