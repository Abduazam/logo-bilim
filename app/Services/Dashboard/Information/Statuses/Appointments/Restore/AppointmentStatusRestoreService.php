<?php

namespace App\Services\Dashboard\Information\Statuses\Appointments\Restore;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Restore\RestoreService;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;

class AppointmentStatusRestoreService extends RestoreService
{
    public function __construct(protected AppointmentStatus $appointmentStatus) { }

    protected function restore(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->appointmentStatus->restore();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
