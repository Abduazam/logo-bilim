<?php

namespace App\Services\Dashboard\Information\AppointmentStatuses\Delete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Delete\DeleteService;
use App\Models\Dashboard\Information\AppointmentStatuses\AppointmentStatus;

class AppointmentStatusDeleteService extends DeleteService
{
    public function __construct(protected AppointmentStatus $appointmentStatus) { }

    protected function delete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->appointmentStatus->delete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
