<?php

namespace App\Repositories\Dashboard\Information\Statuses;

use App\Models\Dashboard\Information\RelativeStatuses\RelativeStatus;
use App\Models\Dashboard\Information\AppointmentStatuses\AppointmentStatus;

class StatusRepository
{
    public function getRelativeStatusesCount(): int
    {
        return RelativeStatus::query()->count();
    }

    public function getAppointmentStatusesCount(): int
    {
        return AppointmentStatus::query()->count();
    }
}
