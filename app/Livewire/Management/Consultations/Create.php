<?php

namespace App\Livewire\Management\Consultations;

use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use App\Livewire\Management\Consultations\Forms\CreateConsultationForm;
use App\Repositories\Dashboard\Information\Types\Payments\PaymentRepository;
use App\Livewire\Management\Consultations\Traits\ActionOnConsultationCreate;
use App\Repositories\Dashboard\Information\Statuses\Relatives\RelativeRepository;
use App\Services\Dashboard\Management\Consultations\Create\ConsultationCreateService;

class Create extends Component
{
    use ActionOnConsultationCreate, DispatchingTrait;

    public CreateConsultationForm $form;

    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function create(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new ConsultationCreateService($validatedData);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatch('refresh');
                $this->dispatchForCreate('consultation', $this->form->clients['info']['first_name'] . ' ' . $this->form->clients['info']['last_name']);
                $this->form->reset();
            } else {
                throw $response;
            }
        }
    }

    public function render(
        RelativeRepository $relativeStatusRepository,
        PaymentRepository $paymentTypeRepository
    ): View
    {
        return view('livewire.management.consultations.create', [
            'relativeStatuses' => $relativeStatusRepository->getAll(),
            'paymentTypes' => $paymentTypeRepository->getAll(),
        ]);
    }
}
