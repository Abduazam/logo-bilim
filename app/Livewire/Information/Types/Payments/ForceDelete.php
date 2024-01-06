<?php

namespace App\Livewire\Information\Types\Payments;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Information\Types\Payments\PaymentType;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Types\Payments\ForceDelete\PaymentTypeForceDeleteService;

class ForceDelete extends Component
{
    use DispatchingTrait;

    public PaymentType $paymentType;

    /**
     * @throws Exception
     */
    public function forceDelete(): void
    {
        $service = new PaymentTypeForceDeleteService($this->paymentType);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-trash text-danger', 'force-deleted-successfully', "<b>Payment type completely deleted:</b> {$this->paymentType->title}");
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.information.types.payments.force-delete');
    }
}
