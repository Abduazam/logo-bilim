<?php

namespace App\Contracts\Enums\Management\Appointments;

enum AppointmentStatusEnum : string
{
    case PENDING = 'warning';
    case STARTED = 'success';
    case CANCELED = 'danger';

    public static function getValueByText(string $key)
    {
        $enum = [
            'pending' => self::PENDING->value,
            'started' => self::STARTED->value,
            'canceled' => self::CANCELED->value,
        ];

        return $enum[strtolower($key)] ?? null;
    }
}
