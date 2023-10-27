<?php

namespace App\Services\Dashboard\Features\Languages\ForceDelete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Features\Languages\Language;
use App\Contracts\Abstracts\Services\ForceDelete\ForceDeleteService;

class LanguageForceDeleteService extends ForceDeleteService
{
    public function __construct(protected Language $language) { }

    protected function forceDelete(): bool|Exception
    {
        return DB::transaction(function () {
            $this->language->forceDelete();

            return true;
        }, 5);
    }
}
