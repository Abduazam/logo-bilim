<?php

namespace App\DTO\Dashboard\Management\Consultations;

use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;

class ConsultationDTO
{
    protected int $user_id;
    protected int $payment_amount;
    protected int $payment_type_id;
    protected mixed $created_date;
    protected mixed $start_time;
    protected mixed $end_time;
    protected int $consultation_status_id;

    public function __construct(array $payment, string $created_date, string $start_time, string $end_time)
    {
        $this->user_id = $this->getUserId();
        $this->payment_amount = $payment['payment_amount'];
        $this->payment_type_id = $payment['payment_type_id'];
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->created_date = $created_date;
        $this->consultation_status_id = $this->getAppointmentStatusId();
    }

    public function getAsArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'payment_amount' => $this->payment_amount,
            'payment_type_id' => $this->payment_type_id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'created_date' => $this->created_date,
            'consultation_status_id' => $this->consultation_status_id
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
