<?php

namespace App\Repositories\Dashboard\Information;

use App\Models\Dashboard\Information\Clients\Client;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Models\Dashboard\Information\Teachers\Teacher;
use App\Models\Dashboard\Information\Services\Service;

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

    public function getClientsCount(): int
    {
        return Client::query()->count();
    }
}
