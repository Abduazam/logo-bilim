<?php

namespace App\Repositories\Dashboard\Information;

use App\Models\Dashboard\Information\Branches\Branch;
use App\Models\Dashboard\Information\Services\Service;
use App\Models\Dashboard\Information\Teachers\Teacher;

class InformationRepository
{
    public function getBranchesCount(): int
    {
        return Branch::query()->count();
    }

    public function getServicesCount(): int
    {
        return Service::query()->count();
    }

    public function getTeachersCount(): int
    {
        return Teacher::query()->count();
    }
}
