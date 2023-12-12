<?php

namespace App\Livewire\Information\Types\Payments;

use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Models\Dashboard\Information\Types\Payments\PaymentType;
use App\Services\Dashboard\Information\Types\PaymentTypes\Delete\PaymentTypeDeleteService;
use Exception;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    use DispatchingTrait;

    public PaymentType $paymentType;

    /**
     * @throws Exception
     */
    public function delete(): void
    {
        $service = new PaymentTypeDeleteService($this->paymentType);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-trash text-danger', 'deleted-successfully', "<b>Payment type deleted:</b> {$this->paymentType->translation->translation}");
        } else {
            throw $response;
        }
    }

    #[On('updated')]
    public function render(): View
    {
        return view('livewire.information.types.payments.delete');
    }
}
