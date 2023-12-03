<?php

namespace App\Livewire\Information\RelativeStatuses;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Models\Dashboard\Information\RelativeStatuses\RelativeStatus;
use App\Services\Dashboard\Information\RelativeStatuses\ForceDelete\RelativeStatusForceDeleteService;

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
        return view('livewire.information.relative-statuses.force-delete');
    }
}
