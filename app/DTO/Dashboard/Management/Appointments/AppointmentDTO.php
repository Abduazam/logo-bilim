<?php

namespace App\DTO\Dashboard\Management\Appointments;

use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;

class AppointmentDTO
{
    protected int $user_id;
    protected int $branch_id;
    protected int $teacher_id;
    protected int $service_id;
    protected int $service_price;
    protected mixed $start_time;
    protected int $appointment_status_id;

    public function __construct(int $branch_id, int $teacher_id, int $service_id, int $service_price, mixed $start_time)
    {
        $this->user_id = $this->getUserId();
        $this->branch_id = $branch_id;
        $this->teacher_id = $teacher_id;
        $this->service_id = $service_id;
        $this->service_price = $service_price;
        $this->start_time = $start_time;
        $this->appointment_status_id = $this->getAppointmentStatusId();
    }

    public function getAsArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'branch_id' => $this->branch_id,
            'teacher_id' => $this->teacher_id,
            'service_id' => $this->service_id,
            'service_price' => $this->service_price,
            'start_time' => $this->start_time,
            'appointment_status_id' => $this->appointment_status_id,
        ];
    }

    private function getUserId()
    {
        return auth()->user()->id;
    }

    private function getAppointmentStatusId()
    {
        return AppointmentStatus::where('key', 'pending')->pluck('id')->first();
    }
}
