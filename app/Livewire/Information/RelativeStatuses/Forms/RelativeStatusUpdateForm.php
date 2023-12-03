<?php

namespace App\Livewire\Information\RelativeStatuses\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\Information\RelativeStatuses\RelativeStatus;

class RelativeStatusUpdateForm extends Form
{
    #[Validate([
        'translations' => 'required|array',
        'translations.*' => 'required|string|min:2',
    ], as: [
        'translations' => 'relative name',
        'translations.*' => 'relative name',
    ])]
    public array $translations = [];

    public function setValues(RelativeStatus $relativeStatus)
    {
        foreach ($relativeStatus->translations as $translation) {
            $this->translations[$translation->slug] = $translation->translation;
        }
    }
}
