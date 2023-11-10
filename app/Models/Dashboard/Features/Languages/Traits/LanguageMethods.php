<?php

namespace App\Models\Dashboard\Features\Languages\Traits;

use App\Models\Dashboard\Features\Languages\Language;

trait LanguageMethods
{
    /**
     * Get language's slug inside code tag.
     *
     * @return string
     */
    public function getSlug(): string
    {
        return '<code>' . $this->slug . '</code>';
    }

    /**
     * Checking language is last language or not.
     *
     * @return bool
     */
    public function isLast(): bool
    {
        return !Language::where('id', '<>', $this->id)->exists();
    }
}
