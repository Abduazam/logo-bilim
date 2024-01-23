<?php

namespace App\Models\Dashboard\Information\Services\Traits;

use App\Models\Dashboard\Information\Branches\BranchService;

trait ServiceMethods
{
    public function getPrice(int $branch_id): bool|string|null
    {
        $branchService = BranchService::where('branch_id', $branch_id)->where('service_id', $this->id)->first();
        return $branchService?->price;
    }
}
