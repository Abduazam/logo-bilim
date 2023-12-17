<?php

namespace App\DTO\Dashboard\Management\Appointments;

class AppointmentClientDTO
{
    public function __construct(
        protected array $clients,
        protected array $payments
    ) { }

    public function getAsArray(): array
    {
        $clients = [];

        foreach ($this->clients as $id => $client) {
            $payment = $this->payments[$id] ?? [];

            $clients[$id] = [
                'client_id' => $client['client_id'] ?? $client['info'],
                'payment_amount' => intval($payment['payment_amount'] ?? 0),
                'payment_type_id' => intval($payment['payment_type_id'] ?? 0),
                'teacher_salary' => intval($payment['teacher_salary'] ?? 0),
                'benefit' => intval($payment['benefit'] ?? 0),
            ];
        }

        return $clients;
    }
}
