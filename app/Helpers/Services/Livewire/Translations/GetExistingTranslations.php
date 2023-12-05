<?php

namespace App\Helpers\Services\Livewire\Translations;

class GetExistingTranslations
{
    public function getExistingTranslations($model): array
    {
        $translations = [];

        foreach ($model->translations as $translation) {
            $translations[$translation->slug] = $translation->translation;
        }

        return $translations;
    }
}
