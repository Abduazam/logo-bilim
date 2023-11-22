<?php

namespace App\Services\Dashboard\Information\Services\Restore;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Services\Service;
use App\Contracts\Abstracts\Services\Restore\RestoreService;

class ServiceRestoreService extends RestoreService
{
    public function __construct(protected Service $service) { }

    protected function restore(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->service->restore();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
