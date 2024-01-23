<?php

namespace App\Livewire\Management\Consultations;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Illuminate\Validation\ValidationException;
use App\Models\Dashboard\Management\Consultations\Consultation;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Livewire\Management\Consultations\Forms\UpdateConsultationForm;
use App\Livewire\Management\Consultations\Traits\ActionOnConsultationCreate;
use App\Repositories\Dashboard\Information\Types\Payments\PaymentRepository;
use App\Repositories\Dashboard\Information\Statuses\Relatives\RelativeRepository;
use App\Services\Dashboard\Management\Consultations\Update\ConsultationUpdateService;

class Update extends Component
{
    use ActionOnConsultationCreate, DispatchingTrait;

    public Consultation $consultation;

    public UpdateConsultationForm $form;

    public function mount(): void
    {
        $this->form->setValues($this->consultation);
    }

    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function update(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new ConsultationUpdateService($validatedData, $this->consultation);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatchMany(['refresh', 'updated']);
                $this->dispatchForUpdate('consultation', $this->consultation->id);
                $this->form->reset();
                $this->mount();
            } else {
                throw $response;
            }
        }
    }

    #[On('updated')]
    public function render(
        RelativeRepository $relativeStatusRepository,
        PaymentRepository $paymentTypeRepository
    ): View
    {
        return view('livewire.management.consultations.update', [
            'relativeStatuses' => $relativeStatusRepository->getAll(),
            'paymentTypes' => $paymentTypeRepository->getAll(),
        ]);
    }
}
