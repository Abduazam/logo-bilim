<?php

namespace App\Livewire\Features\Languages\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\Features\Languages\Language;

class LanguageUpdateForm extends Form
{
    #[Validate('required|string|min:2')]
    public string $slug = '';

    #[Validate('required|string|min:2')]
    public string $title = '';

    public function setValues(Language $language): void
    {
        $this->slug = $language->slug;
        $this->title = $language->title;
    }
}
