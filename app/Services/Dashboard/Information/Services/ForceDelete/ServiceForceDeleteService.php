<?php

namespace App\Services\Dashboard\Information\Services\ForceDelete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Services\Service;
use App\Contracts\Abstracts\Services\ForceDelete\ForceDeleteService;

class ServiceForceDeleteService extends ForceDeleteService
{
    public function __construct(protected Service $service) { }

    protected function forceDelete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->service->forceDelete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
