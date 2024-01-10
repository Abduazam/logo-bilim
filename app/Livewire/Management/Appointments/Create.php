<?php

namespace App\Livewire\Management\Appointments;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Livewire\Management\Appointments\Forms\CreateAppointmentForm;
use App\Repositories\Dashboard\Information\Branches\BranchRepository;
use App\Livewire\Management\Appointments\Traits\ActionOnAppointmentCreate;
use App\Repositories\Dashboard\Information\Types\Payments\PaymentRepository;
use App\Repositories\Dashboard\Information\Statuses\Relatives\RelativeRepository;
use App\Services\Dashboard\Management\Appointments\Appointment\Create\AppointmentCreateService;

class Create extends Component
{
    use ActionOnAppointmentCreate, DispatchingTrait;

    public CreateAppointmentForm $form;

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

        return view('livewire.management.appointments.create', [
            'branches' => $branches,
            'relativeStatuses' => $relativeStatusRepository->getAll(),
            'paymentTypes' => $paymentTypeRepository->getAll(),
        ]);
    }
}
