<?php

namespace App\Livewire\Information\Types\Payments;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Information\PaymentTypes\PaymentType;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Livewire\Information\Types\Payments\Forms\PaymentTypeUpdateForm;
use App\Services\Dashboard\Information\PaymentTypes\Update\PaymentTypeUpdateService;

class Update extends Component
{
    use DispatchingTrait;

    public PaymentType $paymentType;
    public PaymentTypeUpdateForm $form;

    public function mount(): void
    {
        $this->form->setValues($this->paymentType);
    }

    /**
     * @throws Exception
     */
    public function update(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new PaymentTypeUpdateService($validatedData, $this->paymentType);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatchMany(['refresh', 'updated']);
                $this->dispatchSuccess('fa fa-pen text-info', 'updated-successfully', "<b>Payment type updated:</b><br>{$this->paymentType->translation->translation} => {$this->form->translations[app()->getLocale()]}");
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.information.types.payments.update');
    }
}
