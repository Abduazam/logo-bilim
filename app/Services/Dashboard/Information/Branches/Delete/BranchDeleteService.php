<?php

namespace App\Services\Dashboard\Information\Branches\Delete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Contracts\Abstracts\Services\Delete\DeleteService;

class BranchDeleteService extends DeleteService
{
    public function __construct(protected Branch $branch) { }

    protected function delete(): bool|Exception
    {
        return DB::transaction(function () {
            $this->branch->delete();

            return true;
        }, 5);
    }
}
