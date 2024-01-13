<?php

namespace App\Contracts\Traits\Dashboard\Models;

use App\Contracts\Enums\Management\Appointments\AppointmentStatusEnum;

trait AppointmentStatusTrait
{
    /**
     * Gets appointment status
     * @returns string
     */
    public function getAppointmentStatus(): string
    {
        $ase = AppointmentStatusEnum::getValueByText($this->appointmentStatus->key);
        return "<span class='btn py-0 px-2 btn-alt-$ase' style='font-size: 14px!important;'><small>{$this->appointmentStatus->title}</small></span>";
    }
}
