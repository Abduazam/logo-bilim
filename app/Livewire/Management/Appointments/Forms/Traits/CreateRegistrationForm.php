<?php

namespace App\Livewire\Management\Appointments\Forms\Traits;

use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Illuminate\Support\Collection;
use App\Helpers\Services\Livewire\Hours\GenerateWorkHours;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Livewire\Management\Appointments\Forms\Traits\Methods\RegistrationFormMethods;

trait CreateRegistrationForm
{
    use RegistrationFormMethods;

    public bool $registrationForm = false;

    public ?Collection $services;
    public ?Collection $teachers;
    public array $startTimes = [];

    #[Validate('required|numeric|exists:branches,id')]
    public ?int $branch_id = null;

    #[Validate('required|numeric|exists:services,id')]
    public ?int $service_id = null;

    #[Validate('required|numeric|exists:teachers,id')]
    public ?int $teacher_id = null;

    public mixed $start_date = null;

    public mixed $end_date = null;

    public mixed $start_time = null;

    #[Validate([
        'dates' => 'required|array',
        'dates.*' => 'required|array',
        'dates.*.date' => 'required|string',
        'dates.*.hours' => 'required|array',
        'dates.*.hours.*' => 'required|string',
    ], as: [
        'dates.*.date' => 'date',
        'dates.*.hours' => 'hours',
        'dates.*.hours.*' => 'hour',
    ])]
    public array $dates = [];

    private array $date_hours = [
        'date' => null,
        'hours' => [],
    ];

    public function setTimes(): void
    {
        $getHoursHelper = new GenerateWorkHours();
        $this->startTimes = $getHoursHelper->generate();
    }

    public function clearIds(bool $service, bool $teacher, bool $start_date, bool $end_date, bool $start_time, bool $dates): void
    {
        if ($service)
            $this->service_id = null;

        if ($teacher)
            $this->teacher_id = null;

        if ($start_date)
            $this->start_date = null;

        if ($end_date)
            $this->end_date = null;

        if ($start_time)
            $this->start_time = null;

        if ($dates)
            $this->dates = [];
    }

    public function addAppointmentDates(): void
    {
        $beginDate = Carbon::parse($this->start_date);

        if (!is_null($this->end_date)) {
            $this->dates = [];
            $endDate = Carbon::parse($this->end_date);

            while ($beginDate->lte($endDate)) {
                $this->date_hours['date'] = $beginDate->toDateString();
                $this->dates[] = $this->date_hours;
                $beginDate->addDay();
            }
        } else {
            $this->date_hours['date'] = $beginDate->toDateString();
            $this->dates[] = $this->date_hours;
        }
    }

    public function addAppointmentDateHours(): void
    {
        foreach ($this->dates as &$date) {
            $hasAppointment = Appointment::where('branch_id', $this->branch_id)
                ->where('service_id', $this->service_id)
                ->where('teacher_id', $this->teacher_id)
                ->where('created_date', $date['date'])->where('start_time', $this->start_time)->first();

            if (!in_array($this->start_time, $date['hours']) && !$hasAppointment) {
                $date['hours'][] = $this->start_time;
            }
        }
    }

    public function removeDate(int $index): void
    {
        unset($this->dates[$index]);
        $this->checkRegistrationFormTrue();
    }

    public function removeDateHour(int $dateIndex, int $hourIndex): void
    {
        unset($this->dates[$dateIndex]['hours'][$hourIndex]);
        $this->checkRegistrationFormTrue();
    }

    public function checkRegistrationFormTrue(): void
    {
        $requiredFields = [
            $this->branch_id,
            $this->service_id,
            $this->teacher_id,
            $this->start_date,
            $this->start_time,
        ];

        $allFieldsNotNull = !in_array(null, $requiredFields, true);

        $this->registrationForm = $allFieldsNotNull && !empty($this->dates);

        if ($this->registrationForm) {
            foreach ($this->dates as $date) {
                if (empty($date['hours'])) {
                    $this->registrationForm = false;
                    break;
                }
            }
        }
    }
}
