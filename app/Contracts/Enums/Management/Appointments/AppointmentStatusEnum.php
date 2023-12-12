<?php

namespace App\Contracts\Enums\Management\Appointments;

enum AppointmentStatusEnum : string
{
    case PENDING = 'warning';
    case BEGAN = 'success';

    public static function getValueByText(string $key)
    {
        $enum = [
            'pending' => self::PENDING->value,
            'began' => self::BEGAN->value,
        ];

        return $enum[strtolower($key)] ?? null;
    }
}
