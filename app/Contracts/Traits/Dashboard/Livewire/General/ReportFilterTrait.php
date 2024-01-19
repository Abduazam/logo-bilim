<?php

namespace App\Contracts\Traits\Dashboard\Livewire\General;

trait ReportFilterTrait
{
    public ?string $begin_date = null;

    public ?string $end_date = null;

    public ?int $teacher_id = null;

    public ?int $branch_id = null;

    protected function setDefaultBeginDate(): void
    {
        $this->begin_date = date('Y-m-d');
    }

    protected function setDefaultEndDate(): void
    {
        $this->end_date = date('Y-m-d');
    }
}
