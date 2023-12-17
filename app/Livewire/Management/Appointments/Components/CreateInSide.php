<?php

namespace App\Livewire\Management\Appointments\Components;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use App\Livewire\Management\Appointments\Traits\ActionOnAppointment;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Repositories\Dashboard\Information\Branches\BranchRepository;
use App\Livewire\Management\Appointments\Forms\Components\CreateInSideForm;
use App\Repositories\Dashboard\Information\Types\Payments\PaymentRepository;
use App\Repositories\Dashboard\Information\Statuses\Relatives\RelativeRepository;
use App\Services\Dashboard\Management\Appointments\Appointment\Create\AppointmentCreateService;

class CreateInSide extends Component
{
    use ActionOnAppointment, DispatchingTrait;

    public CreateInSideForm $form;

    public function mount(): void
    {
        $this->form->addClient();
    }

    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function create(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new AppointmentCreateService($validatedData);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatch('refresh');
                $this->dispatchSuccess('fa fa-check text-success', 'created-successfully', "<b>New appointment</b>");
                $this->form->reset();
                $this->mount();
            } else {
                throw $response;
            }
        }
    }

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

        return view('livewire.management.appointments.components.create-in-side', [
            'branches' => $branches,
            'relativeStatuses' => $relativeStatusRepository->getAll(),
            'paymentTypes' => $paymentTypeRepository->getAll(),
        ]);
    }
}
