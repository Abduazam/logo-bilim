<?php

namespace App\Services\Dashboard\Information\Branches\Restore;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Contracts\Abstracts\Services\Restore\RestoreService;

class BranchRestoreService extends RestoreService
{
    public function __construct(protected Branch $branch) { }

    protected function restore(): bool|Exception
    {
        return DB::transaction(function () {
            $this->branch->restore();

            return true;
        }, 5);
    }
}
