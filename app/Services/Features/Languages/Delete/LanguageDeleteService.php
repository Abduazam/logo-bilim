<?php

namespace App\Services\Features\Languages\Delete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Features\Languages\Language;
use App\Contracts\Abstracts\Services\Delete\DeleteService;

class LanguageDeleteService extends DeleteService
{
    public function __construct(protected Language $language) { }

    /**
     * @throws Exception
     */
    protected function delete(): void
    {
        DB::beginTransaction();
        try {
            $this->language->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
