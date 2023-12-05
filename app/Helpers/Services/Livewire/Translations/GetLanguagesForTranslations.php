<?php

namespace App\Helpers\Services\Livewire\Translations;

use App\Repositories\Dashboard\Features\Languages\LanguageRepository;

class GetLanguagesForTranslations
{
    public function getLanguageSlugs(): array
    {
        $languageRepository = new LanguageRepository();

        $languages = $languageRepository->getAll()->toArray();

        $languageSlugs = array_column($languages, 'slug');

        return array_fill_keys($languageSlugs, null);
    }
}
