<?php

namespace App\Models\Dashboard\Management\Consultations\Traits;

trait ConsultationMethods
{
    /**
     * Gets full start-end time value as H:i
     * @return string
     */
    public function getFullTime(): string
    {
        return date('H:i', strtotime($this->start_time)) . ' - ' . date('H:i', strtotime($this->end_time));
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
     * Gets end_time value as H:i
     * @return string
     */
    public function getEndTime(): string
    {
        return date('H:i', strtotime($this->end_time));
    }
}
