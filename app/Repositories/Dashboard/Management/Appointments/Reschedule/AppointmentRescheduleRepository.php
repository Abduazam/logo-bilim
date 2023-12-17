<?php

namespace App\Repositories\Dashboard\Management\Appointments\Reschedule;

use App\Helpers\Services\Livewire\Hours\GenerateWorkHours;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Repositories\Dashboard\Management\Appointments\AppointmentRepository;

class AppointmentRescheduleRepository
{
    public function getHours(Appointment $appointment): array
    {
        $generateHours = new GenerateWorkHours();
        $allHours = $generateHours->generate();

        $appointmentRepository = new AppointmentRepository();
        $busyHours = $appointmentRepository->getBusyHours($appointment->branch_id, $appointment->service_id, $appointment->teacher_id);

        $freeHours = array_diff($allHours, $busyHours);
        $freeHours[] = $appointment->getStartTime();

        sort($freeHours);

        return $freeHours;
    }
}
