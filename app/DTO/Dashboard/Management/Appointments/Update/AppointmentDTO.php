<?php

namespace App\DTO\Dashboard\Management\Appointments\Update;

class AppointmentDTO
{
    protected int $branch_id;
    protected int $teacher_id;
    protected int $service_id;
    protected int $service_price;
    protected mixed $start_time;
    protected mixed $created_date;

    public function __construct(int $branch_id, int $teacher_id, int $service_id, int $service_price, mixed $start_time, mixed $created_date)
    {
        $this->branch_id = $branch_id;
        $this->teacher_id = $teacher_id;
        $this->service_id = $service_id;
        $this->service_price = $service_price;
        $this->start_time = $start_time;
        $this->created_date = $created_date;
    }

    public function getAsArray(): array
    {
        return [
            'branch_id' => $this->branch_id,
            'teacher_id' => $this->teacher_id,
            'service_id' => $this->service_id,
            'service_price' => $this->service_price,
            'start_time' => $this->start_time . ":00",
            'created_date' => $this->created_date,
        ];
    }
}
