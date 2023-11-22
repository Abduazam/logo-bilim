<?php

namespace App\Services\Dashboard\Features\Languages\Restore;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Features\Languages\Language;
use App\Contracts\Abstracts\Services\Restore\RestoreService;

class LanguageRestoreService extends RestoreService
{
    public function __construct(protected Language $language) { }

    protected function restore(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->language->restore();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
