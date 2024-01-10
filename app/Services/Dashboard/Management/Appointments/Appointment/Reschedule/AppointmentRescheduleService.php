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
    protected string $created_date;

    public function __construct(array $data, Appointment $appointment)
    {
        $this->appointment = $appointment;
        $this->start_time = $data['start_time'];
        $this->created_date = $data['date'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->appointment->update([
                    'start_time' => $this->start_time,
                    'created_date' => $this->created_date,
                ]);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
