<?php

namespace App\Services\Dashboard\Features\Languages\Delete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Features\Languages\Language;
use App\Contracts\Abstracts\Services\Delete\DeleteService;
use App\Repositories\Dashboard\Features\Languages\LanguageRepository;
use App\Services\Dashboard\Features\Languages\Change\LanguageChangeService;

class LanguageDeleteService extends DeleteService
{
    protected LanguageRepository $repository;

    public function __construct(protected Language $language)
    {
        $this->repository = new LanguageRepository();
    }

    protected function delete(): bool|Exception
    {
        return DB::transaction(function () {
            $this->language->delete();

            if ($this->language->slug === app()->getLocale()) {
                $language = $this->repository->getOne();
                (new LanguageChangeService($language->slug))();
            }

            return true;
        }, 5);
    }
}
