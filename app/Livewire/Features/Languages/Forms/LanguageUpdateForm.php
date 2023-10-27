<?php

namespace App\Livewire\Features\Languages\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use App\Models\Dashboard\Features\Languages\Language;

class LanguageUpdateForm extends Form
{
    #[Rule('required|string|min:2')]
    public string $slug = '';

    #[Rule('required|string|min:2')]
    public string $title = '';

    public function setValues(Language $language): void
    {
        $this->slug = $language->slug;
        $this->title = $language->title;
    }
}
