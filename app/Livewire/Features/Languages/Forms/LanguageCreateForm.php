<?php

namespace App\Livewire\Features\Languages\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class LanguageCreateForm extends Form
{
    #[Rule('required|string|min:2|unique:languages,slug')]
    public string $slug = '';

    #[Rule('required|string|min:2')]
    public string $title = '';
}
