<?php

namespace App\Livewire\Information\Types\Payments;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Information\Types\Payments\PaymentType;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Types\Payments\Restore\PaymentTypeRestoreService;

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
            $this->dispatchSuccess('fa fa-rotate-left text-primary', 'restored-successfully', "<b>Payment type restored:</b> {$this->paymentType->title}");
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.information.types.payments.restore');
    }
}
