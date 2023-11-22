<?php

namespace App\Services\Dashboard\Information\Branches\ForceDelete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Contracts\Abstracts\Services\ForceDelete\ForceDeleteService;

class BranchForceDeleteService extends ForceDeleteService
{
    public function __construct(protected Branch $branch) { }

    protected function forceDelete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->branch->forceDelete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
