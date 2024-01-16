<?php

namespace App\Repositories\Dashboard\Management;

use App\Models\Dashboard\Management\Consumptions\Consumption;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Models\Dashboard\Management\Consultations\Consultation;

class ManagementRepository
{
    public function getAppointmentsCount(): int
    {
        return Appointment::query()->whereDate('created_date', now())->count();
    }

    public function getConsultationsCount(): int
    {
        return Consultation::query()->whereDate('created_date', now())->count();
    }

    public function getConsumptionsCount(): int
    {
        return Consumption::query()->whereDate('created_at', now())->count();
    }
}
