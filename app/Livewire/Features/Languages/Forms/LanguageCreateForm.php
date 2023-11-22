<?php

namespace App\Livewire\Features\Languages\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class LanguageCreateForm extends Form
{
    #[Validate('required|string|min:2|unique:languages,slug')]
    public string $slug = '';

    #[Validate('required|string|min:2')]
    public string $title = '';
}
