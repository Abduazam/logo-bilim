<?php

namespace App\Livewire\Information\Statuses\Relatives\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\Information\RelativeStatuses\RelativeStatus;
use App\Helpers\Services\Livewire\Translations\GetExistingTranslations;

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
