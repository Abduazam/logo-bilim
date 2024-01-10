<?php

namespace App\Livewire\Management\Appointments\Forms\Traits\Methods;

use App\Models\Dashboard\Information\Branches\Branch;
use App\Repositories\Dashboard\Information\Services\ServiceRepository;
use App\Repositories\Dashboard\Information\Teachers\TeacherRepository;

trait RegistrationFormMethods
{
    public function setBranch(Branch $branch): void
    {
        $this->branch_id = $branch->id;
        $this->setServices();
    }

    public function setServices(): void
    {
        $serviceRepository = new ServiceRepository();
        $this->services = $serviceRepository->getByBranch($this->branch_id);
    }

    public function setTeachers(): void
    {
        $this->teacher_id = null;

        $teacherRepository = new TeacherRepository();
        $this->teachers = $teacherRepository->getByBranchService($this->branch_id, $this->service_id);
    }
}
