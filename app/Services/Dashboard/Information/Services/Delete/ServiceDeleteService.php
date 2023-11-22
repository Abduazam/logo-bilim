<?php

namespace App\Services\Dashboard\Information\Services\Delete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Services\Service;
use App\Contracts\Abstracts\Services\Delete\DeleteService;

class ServiceDeleteService extends DeleteService
{
    public function __construct(protected Service $service) { }

    protected function delete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->service->delete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
