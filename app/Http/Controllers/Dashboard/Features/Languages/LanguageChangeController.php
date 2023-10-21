<?php

namespace App\Http\Controllers\Dashboard\Features\Languages;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Services\Dashboard\Features\Languages\Change\LanguageChangeService;

class LanguageChangeController extends DashboardController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $slug): RedirectResponse
    {
        (new LanguageChangeService($slug))();
        return redirect()->back();
    }
}
