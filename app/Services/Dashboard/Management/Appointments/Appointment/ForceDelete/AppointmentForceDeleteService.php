<?php

namespace App\Services\Dashboard\Management\Appointments\Appointment\ForceDelete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Contracts\Abstracts\Services\ForceDelete\ForceDeleteService;

class AppointmentForceDeleteService extends ForceDeleteService
{
    public function __construct(protected Appointment $appointment) { }

    protected function forceDelete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->appointment->forceDelete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
