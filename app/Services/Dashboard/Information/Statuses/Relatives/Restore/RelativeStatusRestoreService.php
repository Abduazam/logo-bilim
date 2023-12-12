<?php

namespace App\Services\Dashboard\Information\Statuses\Relatives\Restore;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Restore\RestoreService;
use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;

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
