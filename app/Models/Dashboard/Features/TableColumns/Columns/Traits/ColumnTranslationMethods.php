<?php

namespace App\Models\Dashboard\Features\TableColumns\Columns\Traits;

use App\Models\Dashboard\Features\Languages\Language;

trait ColumnTranslationMethods
{
    /**
     * Getting language title by translations slug.
     *
     * @return string
     */
    public function getSlugLanguage(): string
    {
        return $this->belongsTo(Language::class, 'slug', 'slug')->pluck('title')[0];
    }
}
