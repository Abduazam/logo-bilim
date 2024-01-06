<?php

namespace App\Livewire\Information\Statuses\Relatives\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;

class RelativeStatusUpdateForm extends Form
{
    #[Validate('required|string|min:2')]
    public ?string $title = null;

    public function setValues(RelativeStatus $relativeStatus): void
    {
        $this->title = $relativeStatus->title;
    }
}
