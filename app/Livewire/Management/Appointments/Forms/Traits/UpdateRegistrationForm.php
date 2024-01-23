<?php

namespace App\Livewire\Management\Appointments\Forms\Traits;

use Livewire\Attributes\Validate;
use Illuminate\Support\Collection;
use App\Helpers\Services\Livewire\Hours\GenerateWorkHours;
use App\Repositories\Dashboard\Management\Appointments\AppointmentRepository;
use App\Livewire\Management\Appointments\Forms\Traits\Methods\RegistrationFormMethods;

trait UpdateRegistrationForm
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

    #[Validate('required|date')]
    public mixed $created_date = null;

    #[Validate('required')]
    public mixed $start_time = null;

    public function setTimes(): void
    {
        $generateHours = new GenerateWorkHours();
        $allHours = $generateHours->generate();

        $appointmentRepository = new AppointmentRepository();
        $busyHours = $appointmentRepository->getBusyHours($this->branch_id, $this->service_id, $this->teacher_id, $this->created_date);

        $freeHours = array_diff($allHours, $busyHours);

        sort($freeHours);

        $this->startTimes = $freeHours;
    }

    public function clearIds(bool $service, bool $teacher, bool $created_date, bool $start_time): void
    {
        if ($service)
            $this->service_id = null;

        if ($teacher)
            $this->teacher_id = null;

        if ($created_date)
            $this->created_date = null;

        if ($start_time)
            $this->start_time = null;
    }

    public function checkRegistrationFormTrue(): void
    {
        $requiredFields = [
            $this->branch_id,
            $this->service_id,
            $this->teacher_id,
            $this->created_date,
            $this->start_time,
        ];

        $allFieldsNotNull = !in_array(null, $requiredFields, true);

        $this->checkClientsFormTrue();

        $this->registrationForm = $allFieldsNotNull && $this->clientsForm;
    }
}
