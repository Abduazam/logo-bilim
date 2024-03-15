<?php

namespace App\Livewire\Management\Appointments\Lists;

use Livewire\Component;
use Illuminate\View\View;
use App\Helpers\Services\Livewire\Hours\GenerateWorkHours;
use App\Contracts\Traits\Dashboard\Livewire\General\PaginatingTrait;
use App\Repositories\Dashboard\Information\Branches\BranchRepository;
use App\Repositories\Dashboard\Information\Services\ServiceRepository;
use App\Repositories\Dashboard\Information\Teachers\TeacherRepository;
use App\Repositories\Dashboard\Management\Appointments\AppointmentRepository;
use App\Repositories\Dashboard\Information\Statuses\Appointments\AppointmentRepository as AppointmentStatusesRepository;

class AppointmentsList extends Component
{
    public int $branch_id = 0;
    public int $teacher_id = 0;
    public int $service_id = 0;
    public mixed $hour = 0;
    public mixed $created_date = null;
    public int $appointment_status_id = 0;

    use PaginatingTrait;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(
        AppointmentRepository $appointmentRepository,
        BranchRepository $branchRepository,
        TeacherRepository $teacherRepository,
        ServiceRepository $serviceRepository,
        GenerateWorkHours $generateWorkHours,
        AppointmentStatusesRepository $appointmentStatusRepository
    ): View
    {
        return view('livewire.management.appointments.lists.appointments-list', [
            'appointments' => $appointmentRepository->getFiltered($this->branch_id, $this->teacher_id, $this->service_id, $this->hour, $this->created_date, $this->appointment_status_id, $this->perPage),
            'branches' => $branchRepository->getByUser(auth()->user()),
            'teachers' => $teacherRepository->getByBranch(),
            'services' => $serviceRepository->getByUserBranch(),
            'hours' => $generateWorkHours->generate(),
            'appointmentStatuses' => $appointmentStatusRepository->getAll(),
        ]);
    }
}
