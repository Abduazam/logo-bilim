<?php

namespace App\Livewire\Information\Types\Payments;

use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Models\Dashboard\Information\Types\Payments\PaymentType;
use App\Services\Dashboard\Information\Types\PaymentTypes\Restore\PaymentTypeRestoreService;
use Exception;
use Illuminate\View\View;
use Livewire\Component;

class Restore extends Component
{
    use DispatchingTrait;

    public PaymentType $paymentType;

    /**
     * @throws Exception
     */
    public function restore(): void
    {
        $service = new PaymentTypeRestoreService($this->paymentType);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-rotate-left text-primary', 'restored-successfully', "<b>Payment type restored:</b> {$this->paymentType->translation->translation}");
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.information.types.payments.restore');
    }
}
