<?php

namespace App\Models\Dashboard\Management\Appointments\Traits;

use App\Contracts\Enums\Management\Appointments\AppointmentStatusEnum;

trait AppointmentMethods
{
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
    public function getClients(): string
    {
        $clientsArray = [];

        foreach ($this->clients as $client) {
            $clientsArray[] = "{$client->client->first_name} {$client->client->last_name}";
        }

        return implode(', ', $clientsArray);
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
}
