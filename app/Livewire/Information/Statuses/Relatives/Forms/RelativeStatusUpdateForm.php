<?php

namespace App\Livewire\Information\Statuses\Relatives\Forms;

use App\Helpers\Services\Livewire\Translations\GetExistingTranslations;
use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;
use Livewire\Attributes\Validate;
use Livewire\Form;

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

    public function setValues(RelativeStatus $relativeStatus): void
    {
        $translations = new GetExistingTranslations();
        $this->translations = $translations->getExistingTranslations($relativeStatus);
    }
}
