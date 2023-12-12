<?php

namespace App\Livewire\Management\Appointments\Components\Traits;

use Livewire\Attributes\Validate;
use Illuminate\Support\Collection;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Helpers\Services\Livewire\Hours\GenerateWorkHours;
use App\Models\Dashboard\Information\Branches\BranchServices;
use App\Models\Dashboard\Information\Teachers\TeacherService;
use App\Repositories\Dashboard\Information\Services\ServiceRepository;
use App\Repositories\Dashboard\Information\Teachers\TeacherRepository;
use App\Repositories\Dashboard\Management\Appointments\AppointmentRepository;

trait AppointmentTrait
{
    public bool $appointmentSection = false;

    public ?Collection $services;
    public ?Collection $teachers;
    public array $startTimes = [];

    #[Validate('required|numeric|exists:branches,id')]
    public ?int $branch_id = null;

    #[Validate('required|numeric|exists:services,id')]
    public ?int $service_id = null;

    #[Validate('required|numeric|exists:teachers,id')]
    public ?int $teacher_id = null;

    #[Validate('nullable')]
    public mixed $start_time = null;

    #[Validate('required|numeric')]
    public ?int $service_price = null;

    #[Validate('required|numeric')]
    public ?int $teacher_salary = null;

    #[Validate('required|numeric')]
    public ?int $benefit = null;

    #[Validate('required|numeric')]
    public ?int $payment_amount = null;

    #[Validate('required|numeric|exists:payment_types,id')]
    public ?int $payment_type_id = null;

    public function setBranch(Branch $branch): void
    {
        $this->branch_id = $branch->id;
        $this->services = $branch->services;
    }

    public function setServices(): void
    {
        $serviceRepository = new ServiceRepository();
        $this->services = $serviceRepository->getByBranch($this->branch_id);
    }

    public function setTeachers(): void
    {
        $teacherRepository = new TeacherRepository();
        $this->teachers = $teacherRepository->getByBranchService($this->branch_id, $this->service_id);
    }

    public function setTimes(): void
    {
        $getHoursHelper = new GenerateWorkHours();
        $hours = $getHoursHelper->generate();

        $appointmentRepository = new AppointmentRepository();
        $busyHours = $appointmentRepository->getBusyHours($this->branch_id, $this->service_id, $this->teacher_id);

        $freeHours = $this->teacher_id ? array_diff($hours, $busyHours) : $hours;

        $this->startTimes = $freeHours;
    }

    public function setFreeTeachers(): void
    {
        $teacherRepository = new TeacherRepository();
        $this->teachers = $teacherRepository->getFreeTeachers($this->branch_id, $this->service_id, $this->start_time);
    }

    public function setServicePrice(): void
    {
        $this->service_price = BranchServices::where('branch_id', $this->branch_id)
            ->where('service_id', $this->service_id)
            ->pluck('price')->first();
    }

    public function setTeacherSalary(): void
    {
        $this->teacher_salary = TeacherService::where('branch_id', $this->branch_id)
            ->where('teacher_id', $this->teacher_id)
            ->where('service_id', $this->service_id)
            ->pluck('salary')->first();
    }

    public function setBenefit(): void
    {
        $paymentAmountNumeric = intval($this->payment_amount);
        $teacherSalaryNumeric = intval($this->teacher_salary);

        $this->benefit = $paymentAmountNumeric - $teacherSalaryNumeric;
    }

    public function clearIds($service, $teacher, $start_time): void
    {
        if ($service)
            $this->service_id = null;

        if ($teacher)
            $this->teacher_id = null;

        if ($start_time)
            $this->start_time = null;
    }

    public function activateSectionAppointment(): void
    {
        if (!is_null($this->branch_id) and
            !is_null($this->service_id) and
            (!is_null($this->teacher_id) and $this->teacher_id != 0) and
            !is_null($this->start_time) and
            (!is_null($this->payment_amount) and !is_null($this->payment_type_id))
        ) {
            $this->appointmentSection = true;
        } else {
            $this->appointmentSection = false;
        }
    }
}
