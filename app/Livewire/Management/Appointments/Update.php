<?php

namespace App\Livewire\Management\Appointments;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Illuminate\Validation\ValidationException;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Livewire\Management\Appointments\Forms\UpdateAppointmentForm;
use App\Repositories\Dashboard\Information\Branches\BranchRepository;
use App\Livewire\Management\Appointments\Traits\ActionOnAppointmentUpdate;
use App\Repositories\Dashboard\Information\Types\Payments\PaymentRepository;
use App\Repositories\Dashboard\Information\Statuses\Relatives\RelativeRepository;
use App\Services\Dashboard\Management\Appointments\Appointment\Update\AppointmentUpdateService;

class Update extends Component
{
    use ActionOnAppointmentUpdate, DispatchingTrait;

    public Appointment $appointment;
    public UpdateAppointmentForm $form;

    public function mount(): void
    {
        $this->form->setValues($this->appointment);
    }

    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function update(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new AppointmentUpdateService($validatedData, $this->appointment);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatchMany(['refresh', 'updated']);
                $this->dispatchForUpdate('appointment', $this->appointment->number);
                $this->form->reset();
                $this->mount();
            } else {
                throw $response;
            }
        }
    }

    #[On('updated')]
    public function render(
        BranchRepository $branchRepository,
        RelativeRepository $relativeStatusRepository,
        PaymentRepository $paymentTypeRepository,
    ): View
    {
        $branches = $branchRepository->getByUser(auth()->user());
        if (count($branches) == 1) {
            $this->form->setBranch($branches->first());
        }

        return view('livewire.management.appointments.update', [
            'branches' => $branches,
            'relativeStatuses' => $relativeStatusRepository->getAll(),
            'paymentTypes' => $paymentTypeRepository->getAll(),
        ]);
    }
}
