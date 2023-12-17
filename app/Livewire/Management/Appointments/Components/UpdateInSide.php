<?php

namespace App\Livewire\Management\Appointments\Components;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Illuminate\Validation\ValidationException;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Livewire\Management\Appointments\Traits\ActionOnAppointment;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Repositories\Dashboard\Information\Branches\BranchRepository;
use App\Livewire\Management\Appointments\Forms\Components\UpdateInSideForm;
use App\Repositories\Dashboard\Information\Types\Payments\PaymentRepository;
use App\Repositories\Dashboard\Information\Statuses\Relatives\RelativeRepository;
use App\Services\Dashboard\Management\Appointments\Appointment\Update\AppointmentUpdateService;

class UpdateInSide extends Component
{
    use ActionOnAppointment, DispatchingTrait;

    public Appointment $appointment;
    public UpdateInSideForm $form;

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
                $this->dispatch('refresh');
                $this->dispatchSuccess('fa fa-pen text-info', 'updated-successfully', "<b>Appointment {$this->appointment->id}</b>");
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

        return view('livewire.management.appointments.components.update-in-side', [
            'branches' => $branches,
            'relativeStatuses' => $relativeStatusRepository->getAll(),
            'paymentTypes' => $paymentTypeRepository->getAll(),
        ]);
    }
}
