<?php

namespace App\Livewire\Features\Languages\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use App\Models\Features\Languages\Language;

class LanguageForm extends Form
{
    public Language $language;

    #[Rule('required|string|min:2')] # unique:languages,slug
    public ?string $slug = null;

    #[Rule('required|string|min:2')]
    public ?string $title = null;

    #[Rule('nullable|image|mimes:jpg,jpeg,png,svg')]
    public mixed $thumbnail = null;

    #[Rule('required|string')]
    public string $model = 'language';

    #[Rule('required|string')]
    public string $folder = 'features/languages';

    #[Rule('required|boolean')]
    public bool $removeImage = false;

    public function setValues(Language $item): void
    {
        $this->language = $item;
        $this->slug = $item->slug;
        $this->title = $item->title;
    }

    public function resetValues(): void
    {
        $this->thumbnail = null;
        $this->removeImage = false;
    }
}
