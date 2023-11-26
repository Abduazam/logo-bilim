<?php

namespace App\Models\Dashboard\Information\Services\Traits;

use Illuminate\Support\Number;
use App\Models\Dashboard\Information\Branches\BranchServices;

trait ServiceMethods
{
    public function getPrice(int $branch_id): bool|string
    {
        $pivot = BranchServices::where('branch_id', $branch_id)->where('service_id', $this->id)->first();
        return Number::format($pivot->price);
    }
}
