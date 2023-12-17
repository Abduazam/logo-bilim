<?php

namespace App\Livewire\Reports\DailyReports\Traits;

trait FilterTrait
{
    public mixed $begin_date;
    public mixed $end_date;

    protected function setDefaultBeginDate(): void
    {
        $this->begin_date = date('Y-m-d');
    }
}
