<?php

namespace App\Services\Dashboard\Information\Statuses\Appointments\Update;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;

class AppointmentStatusUpdateService extends UpdateService
{
    protected AppointmentStatus $appointmentStatus;
    protected string $title;

    public function __construct(array $data, AppointmentStatus $appointmentStatus)
    {
        $this->appointmentStatus = $appointmentStatus;
        $this->title = $data['title'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $title = Str::title($this->title);

                $this->appointmentStatus->update(['title' => $title]);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
