<?php

namespace App\Services\Dashboard\Information\RelativeStatuses\Restore;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Restore\RestoreService;
use App\Models\Dashboard\Information\RelativeStatuses\RelativeStatus;

class RelativeStatusRestoreService extends RestoreService
{
    public function __construct(protected RelativeStatus $relativeStatus) { }

    protected function restore(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->relativeStatus->restore();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
