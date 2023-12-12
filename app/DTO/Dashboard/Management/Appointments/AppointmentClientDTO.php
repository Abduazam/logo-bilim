<?php

namespace App\DTO\Dashboard\Management\Appointments;

class AppointmentClientDTO
{
    public function __construct(
        protected ?int $client_id,
        protected int $payment_amount,
        protected int $payment_type_id,
        protected int $teacher_salary,
        protected int $benefit,
        protected string $first_name,
        protected string $last_name,
        protected string $dob,
        protected array $relatives
    ) { }

    public function hasNewClient(): bool
    {
        return is_null($this->client_id);
    }

    public function getAsArray(): array
    {
        return [
            'client_id' => $this->client_id,
            'payment_amount' => $this->payment_amount,
            'payment_type_id' => $this->payment_type_id,
            'teacher_salary' => $this->teacher_salary,
            'benefit' => $this->benefit,
        ];
    }

    public function getNewClientAsArray(): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'dob' => $this->dob,
            'photo' => null,
            'relatives' => $this->relatives
        ];
    }
}
