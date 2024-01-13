<?php

namespace App\Repositories\Dashboard\Management;

use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Models\Dashboard\Management\Consultations\Consultation;

class ManagementRepository
{
    public function getAppointmentsCount(): int
    {
        return Appointment::query()->count();
    }

    public function getConsultationsCount(): int
    {
        return Consultation::query()->count();
    }
}
