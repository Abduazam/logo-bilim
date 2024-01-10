<?php

namespace App\Livewire\Management\Appointments\Traits;

use App\Helpers\Services\Livewire\Hours\GenerateWorkHours;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Repositories\Dashboard\Management\Appointments\AppointmentRepository;

trait ActionOnAppointmentReschedule
{
    public array $times;

    public function mount(): void
    {
        $this->form->setValues($this->appointment);
        $this->times = $this->getHours($this->appointment);
    }

    public function updated($property): void
    {
        if ($property === 'form.date') {
            $this->times = $this->getHours($this->appointment);
            $this->form->start_time = null;
        }
    }

    public function getHours(Appointment $appointment): array
    {
        $generateHours = new GenerateWorkHours();
        $allHours = $generateHours->generate();

        $appointmentRepository = new AppointmentRepository();
        $busyHours = $appointmentRepository->getBusyHours($appointment->branch_id, $appointment->service_id, $appointment->teacher_id, $this->form->date);

        $freeHours = array_diff($allHours, $busyHours);

        sort($freeHours);

        return $freeHours;
    }
}
