<?php

namespace App\Livewire\Management\Consultations\Forms\Traits;

use Livewire\Attributes\Validate;
use App\Helpers\Services\Livewire\Hours\GenerateWorkHours;
use App\Repositories\Dashboard\Management\Consultations\ConsultationRepository;

trait BookingForm
{
    public array $startTimes = [];
    public array $endTimes = [];

    #[Validate('required|date')]
    public mixed $created_date = null;

    #[Validate('required|string')]
    public mixed $start_time = null;

    #[Validate('required|string')]
    public mixed $end_time = null;

    public function clearData(bool $start_time, bool $end_time): void
    {
        if ($start_time)
            $this->start_time = null;

        if ($end_time)
            $this->end_time = null;
    }

    public function setStartTimes(): void
    {
        $allHours = $this->generateHours();

        $busyHours = (new ConsultationRepository())->getBusyHours($this->created_date);

        $freeHours = array_diff($allHours, $busyHours);
        array_pop($freeHours);

        if (!is_null($this->start_time) and !in_array($this->start_time, $freeHours)) {
            $freeHours[] = $this->start_time;
        }

        $this->startTimes = $freeHours;
    }

    public function setEndTimes(): void
    {
        $allHours = $this->generateHours();

        $startTimeIndex = array_search($this->start_time, $allHours);

        $freeHours = array_slice($allHours, $startTimeIndex + 1);

        if (!is_null($this->end_time) and !in_array($this->end_time, $freeHours)) {
            $freeHours[] = $this->end_time;
        }

        $this->endTimes = $freeHours;
    }

    private function generateHours(): array
    {
        $getHoursHelper = new GenerateWorkHours();
        return $getHoursHelper->generate();
    }

    public function validateBooking(): bool
    {
        $requiredFields = [
            $this->created_date,
            $this->start_time,
            $this->end_time,
        ];

        return !in_array(null, $requiredFields, true);
    }
}
