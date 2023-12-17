<?php

namespace App\Services\Dashboard\Management\Appointments\Appointment\Reschedule;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Models\Dashboard\Management\Appointments\Appointment;

class AppointmentRescheduleService extends UpdateService
{
    protected Appointment $appointment;
    protected string $start_time;

    public function __construct(array $data, Appointment $appointment)
    {
        $this->appointment = $appointment;
        $this->start_time = $data['start_time'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->appointment->update([
                    'start_time' => $this->start_time,
                ]);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
