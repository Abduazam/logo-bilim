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
        DB::beginTransaction();
        try {
            $this->language->forceDelete();

            DB::commit();

            return true;
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }
}
