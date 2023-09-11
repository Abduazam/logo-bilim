<?php

namespace App\Services\Features\Languages\Change;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageChangeService
{
    public function __construct(protected string $slug) { }

    public function change(): void
    {
        App::setLocale($this->slug);
        Session::put('locale', $this->slug);
    }
}
