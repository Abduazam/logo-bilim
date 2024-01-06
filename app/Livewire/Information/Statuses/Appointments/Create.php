<?php

namespace App\Livewire\Information\Statuses\Appointments;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Livewire\Information\Statuses\Appointments\Forms\AppointmentStatusCreateForm;
use App\Services\Dashboard\Information\Statuses\Appointments\Create\AppointmentStatusCreateService;

class Create extends Component
{
    use DispatchingTrait;

    public AppointmentStatusCreateForm $form;

    /**
     * @throws Exception
     */
    public function create(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new AppointmentStatusCreateService($validatedData);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatch('refresh');
                $this->dispatchSuccess('fa fa-check text-success', 'created-successfully', "<b>New appointment status:</b> {$this->form->title}");
                $this->form->reset();
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.information.statuses.appointments.create');
    }
}
