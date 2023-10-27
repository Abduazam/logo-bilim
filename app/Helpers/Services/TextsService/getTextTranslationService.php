<?php

namespace App\Helpers\Services\TextsService;

use Illuminate\Support\Facades\Cache;
use App\Models\Dashboard\Features\Texts\Text;

class getTextTranslationService
{
    public static function getTextTranslation(string $key): string
    {
        $cacheKey = 'text_translation_' . app()->getLocale() . '_' . $key;

        return Cache::rememberForever($cacheKey, function () use ($key) {
            $translation = Text::with('translation')
                ->where('key', $key)
                ->first();

            return $translation ? $translation->translation->translation : $key;
        });
    }
}
