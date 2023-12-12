<?php

namespace App\Livewire\Information\Statuses\Relatives;

use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;
use App\Services\Dashboard\Information\Statuses\RelativeStatuses\ForceDelete\RelativeStatusForceDeleteService;
use Exception;
use Illuminate\View\View;
use Livewire\Component;

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
            $this->dispatchSuccess('fa fa-trash text-danger', 'force-deleted-successfully', "<b>Relative status completely deleted:</b> {$this->relativeStatus->translation->translation}");
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.information.statuses.relatives.force-delete');
    }
}
