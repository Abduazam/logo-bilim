<?php

namespace App\Services\Features\Languages\Delete;

use App\Repositories\Features\Languages\LanguageRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Features\Languages\Language;
use App\Contracts\Abstracts\Services\Delete\DeleteService;
use App\Services\Features\Languages\Change\LanguageChangeService;

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

            if ($this->language->slug === app()->getLocale()) {
                $language = (new LanguageRepository())->getOne();

                $service = new LanguageChangeService($language->slug);
                $service->change();
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
