<?php

namespace App\Services\Dashboard\Information\Statuses\Relatives\ForceDelete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\ForceDelete\ForceDeleteService;
use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;

class RelativeStatusForceDeleteService extends ForceDeleteService
{
    public function __construct(protected RelativeStatus $relativeStatus) { }

    protected function forceDelete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->relativeStatus->forceDelete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
