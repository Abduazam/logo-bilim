<?php

namespace App\DTO\Dashboard\Management\Appointments\Create;

use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;

class AppointmentDTO
{
    protected int $user_id;
    protected int $branch_id;
    protected int $service_id;
    protected int $teacher_id;
    protected int $service_price;
    protected array $dates;
    protected int $appointment_status_id;
    protected array $appointments;

    public function __construct(int $branch_id, int $service_id, int $teacher_id, int $service_price, array $dates)
    {
        $this->user_id = $this->getUserId();
        $this->branch_id = $branch_id;
        $this->service_id = $service_id;
        $this->teacher_id = $teacher_id;
        $this->service_price = $service_price;
        $this->dates = $dates;
        $this->appointment_status_id = $this->getAppointmentStatusId();

        $this->appointments = $this->makeAsArray();
    }

    public function makeAsArray(): array
    {
        $appointments = [];

        foreach ($this->dates as $date) {
            foreach ($date['hours'] as $hour) {
                $appointments[] = [
                    'user_id' => $this->user_id,
                    'branch_id' => $this->branch_id,
                    'teacher_id' => $this->teacher_id,
                    'service_id' => $this->service_id,
                    'service_price' => $this->service_price,
                    'start_time' => $hour,
                    'appointment_status_id' => $this->appointment_status_id,
                    'created_date' => $date['date'],
                ];
            }
        }

        return $appointments;
    }

    public function getAsArray(): array
    {
        return $this->appointments;
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
