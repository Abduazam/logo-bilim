<?php

namespace App\Livewire\Management\Consumptions;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;
use App\Models\Dashboard\Management\Consumptions\Consumption;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Management\Consumptions\Delete\ConsumptionDeleteService;

class Delete extends Component
{
    use DispatchingTrait;

    public Consumption $consumption;

    /**
     * @throws Exception
     */
    public function delete(): void
    {
        $service = new ConsumptionDeleteService($this->consumption);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-trash text-danger', 'deleted-successfully', "<b>Consumption deleted:</b> {$this->consumption->comment}");
        } else {
            throw $response;
        }
    }

    #[On('updated')]
    public function render(): View
    {
        return view('livewire.management.consumptions.delete');
    }
}
