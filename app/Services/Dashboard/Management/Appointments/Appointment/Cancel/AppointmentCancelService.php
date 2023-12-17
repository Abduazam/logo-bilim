<?php

namespace App\Services\Dashboard\Management\Appointments\Appointment\Cancel;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;

class AppointmentCancelService extends UpdateService
{
    protected Appointment $appointment;
    protected AppointmentStatus $appointmentStatus;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
        $this->appointmentStatus = AppointmentStatus::where('key', 'canceled')->first();
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->appointment->update([
                    'appointment_status_id' => $this->appointmentStatus->id,
                ]);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
