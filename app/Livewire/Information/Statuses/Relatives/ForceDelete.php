<?php

namespace App\Livewire\Information\Statuses\Relatives;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;
use App\Services\Dashboard\Information\Statuses\Relatives\ForceDelete\RelativeStatusForceDeleteService;

class ForceDelete extends Component
{
    use DispatchingTrait;

    public RelativeStatus $relativeStatus;

    /**
     * @throws Exception
     */
    public function forceDelete(): void
    {
        $service = new RelativeStatusForceDeleteService($this->relativeStatus);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchForForceDelete('relatives', $this->relativeStatus->title);
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.information.statuses.relatives.force-delete');
    }
}
