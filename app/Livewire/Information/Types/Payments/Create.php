<?php

namespace App\Livewire\Information\Types\Payments;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Livewire\Information\Types\Payments\Forms\PaymentTypeCreateForm;
use App\Services\Dashboard\Information\Types\Payments\Create\PaymentTypeCreateService;

class Create extends Component
{
    use DispatchingTrait;

    public PaymentTypeCreateForm $form;

    /**
     * @throws Exception
     */
    public function create(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new PaymentTypeCreateService($validatedData);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatch('refresh');
                $this->dispatchSuccess('fa fa-check text-success', 'created-successfully', "<b>New payment type:</b> {$this->form->title}");
                $this->form->reset();
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.information.types.payments.create');
    }
}
