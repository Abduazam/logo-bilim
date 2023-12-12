<?php

namespace App\Repositories\Dashboard\Information\Statuses;

use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;
use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;

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
