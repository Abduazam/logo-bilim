<?php

namespace App\Http\Controllers\Dashboard\Features\Languages;

use App\Http\Controllers\Controller;
use App\Services\Features\Languages\Change\LanguageChangeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ChangeLanguageController extends Controller
{
    public function change($language): RedirectResponse
    {
        $service = new LanguageChangeService($language);
        $service->change();
        return redirect()->back();
    }
}
