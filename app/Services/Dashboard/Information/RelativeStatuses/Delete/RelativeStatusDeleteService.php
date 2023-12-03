<?php

namespace App\Services\Dashboard\Information\RelativeStatuses\Delete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Delete\DeleteService;
use App\Models\Dashboard\Information\RelativeStatuses\RelativeStatus;

class RelativeStatusDeleteService extends DeleteService
{
    public function __construct(protected RelativeStatus $relativeStatus) { }

    protected function delete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->relativeStatus->delete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
