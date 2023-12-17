<?php

namespace App\Models\Dashboard\Management\Appointments\Traits;

use App\Contracts\Enums\Management\Appointments\AppointmentStatusEnum;

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
            $latestAppointment = self::where('branch_id', $appointment->branch_id)
                ->whereDate('created_date', $appointment->created_date)
                ->latest('number')
                ->first();

            if ($latestAppointment) {
                $appointment->number = $latestAppointment->number + 1;
            } else {
                $appointment->number = 1;
            }
        });
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
     * Gets appointment status
     * @returns string
     */
    public function getAppointmentStatus(): string
    {
        $ase = AppointmentStatusEnum::getValueByText($this->appointmentStatus->key);
        return "<span class='btn py-0 px-2 btn-alt-$ase' style='font-size: 14px!important;'><small>{$this->appointmentStatus->translation->translation}</small></span>";
    }

    /**
     * Check is appointment is pending.
     * @returns bool
     */
    public function isPending(): bool
    {
        return $this->appointmentStatus->key === 'pending';
    }

    /**
     * Check is appointment is started.
     * @returns bool
     */
    public function isStarted(): bool
    {
        return $this->appointmentStatus->key === 'started';
    }

    /**
     * Check is appointment is canceled.
     * @returns bool
     */
    public function isCanceled(): bool
    {
        return $this->appointmentStatus->key === 'canceled';
    }
}
