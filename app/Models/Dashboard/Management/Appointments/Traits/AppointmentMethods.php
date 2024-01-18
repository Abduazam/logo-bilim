<?php

namespace App\Models\Dashboard\Management\Appointments\Traits;

use App\Contracts\Enums\Management\Appointments\AppointmentStatusEnum;
use Illuminate\Support\Number;

trait AppointmentMethods
{
    /**
     * Generates number for application
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($appointment) {
            self::setAppointmentNumber($appointment);
        });

        static::updating(function ($appointment) {
            self::setAppointmentNumber($appointment);
        });
    }

    private static function setAppointmentNumber($appointment): void
    {
        $latestAppointment = self::where('branch_id', $appointment->branch_id)
            ->whereDate('created_date', $appointment->created_date)
            ->latest('number')
            ->first();

        if ($latestAppointment) {
            $appointment->number = $latestAppointment->id === $appointment->id ? $latestAppointment->number : $latestAppointment->number + 1;
        } else {
            $appointment->number = 1;
        }
    }

    /**
     * Gets start_time value as H:i
     * @return string
     */
    public function getStartTime(): string
    {
        return date('H:i', strtotime($this->start_time));
    }

    /**
     * Gets appointment clients
     * @returns string
     */
    public function getClients($br = false): string
    {
        $clientsArray = [];

        foreach ($this->clients as $client) {
            $clientsArray[] = "{$client->client->first_name} {$client->client->last_name}";
        }

        return $br ? implode(',<br> ', $clientsArray) : implode(', ', $clientsArray);
    }

    /**
     * Gets income as format in reports.
     * @returns bool|string
     */
    public function getAsFormatted(int $value): bool|string
    {
        return Number::format($value);
    }
}
