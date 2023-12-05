<?php

namespace App\Services\Dashboard\Information\AppointmentStatuses\ForceDelete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\ForceDelete\ForceDeleteService;
use App\Models\Dashboard\Information\AppointmentStatuses\AppointmentStatus;

class AppointmentStatusForceDeleteService extends ForceDeleteService
{
    public function __construct(protected AppointmentStatus $appointmentStatus) { }

    protected function forceDelete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->appointmentStatus->forceDelete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
