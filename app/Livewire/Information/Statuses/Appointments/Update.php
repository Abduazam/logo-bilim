<?php

namespace App\Livewire\Information\Statuses\Appointments;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;
use App\Livewire\Information\Statuses\Appointments\Forms\AppointmentStatusUpdateForm;
use App\Services\Dashboard\Information\Statuses\Appointments\Update\AppointmentStatusUpdateService;

class Update extends Component
{
    use DispatchingTrait;

    public AppointmentStatus $appointmentStatus;
    public AppointmentStatusUpdateForm $form;

    public function mount(): void
    {
        $this->form->setValues($this->appointmentStatus);
    }

    /**
     * @throws Exception
     */
    public function update(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new AppointmentStatusUpdateService($validatedData, $this->appointmentStatus);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatchMany(['refresh', 'updated']);
                $this->dispatchForUpdate('statuses-appointment', $this->form->title);
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.information.statuses.appointments.update');
    }
}
