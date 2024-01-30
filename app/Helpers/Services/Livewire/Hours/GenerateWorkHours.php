<?php

namespace App\Helpers\Services\Livewire\Hours;

use Carbon\Carbon;

class GenerateWorkHours
{
    const START_TIME = '08:00:00';
    const END_TIME = '20:00:00';

    public function generate(): array
    {
        $startTime = Carbon::createFromFormat('H:i:s', self::START_TIME);
        $endTime = Carbon::createFromFormat('H:i:s', self::END_TIME);

        $times = [];

        while ($startTime <= $endTime) {
            $times[] = $startTime->format('H:i:s');
            $startTime->addHour();
        }

        return $times;
    }
}
