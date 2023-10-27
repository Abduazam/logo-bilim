<?php

namespace App\Livewire\Features\Texts\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use App\Models\Dashboard\Features\Texts\Text;

class TextUpdateForm extends Form
{
    #[Rule('required|string|min:2')]
    public string $key = '';

    #[Rule('nullable|string|min:2')]
    public string $icon = '';

    #[Rule('required|array')]
    public array $translations = [];

    public function setValues(Text $text): void
    {
        $this->key = $text->key;
        $this->icon = $text->icon ?? '';

        foreach ($text->translations as $translation) {
            $this->translations[$translation->slug] = $translation->translation;
        }
    }
}
