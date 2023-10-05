<?php

namespace App\Http\Controllers\Dashboard\Features\Languages;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Dashboard\Features\Languages\Change\LanguageChangeService;

class LanguageChangeController extends Controller
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
