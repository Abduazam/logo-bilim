<?php

namespace App\Services\Dashboard\Features\Languages\Change;

class LanguageChangeService
{
    public function __construct(protected string $slug) { }

    public function __invoke(): void
    {
        app()->setLocale($this->slug);
        session()->put('locale', $this->slug);
    }
}
