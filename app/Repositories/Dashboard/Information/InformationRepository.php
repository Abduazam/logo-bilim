<?php

namespace App\Repositories\Dashboard\Information;

use App\Models\Dashboard\Information\Branches\Branch;

class InformationRepository
{
    public function getBranchesCount(): int
    {
        return Branch::query()->count();
    }
}
