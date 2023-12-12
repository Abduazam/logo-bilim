<?php

namespace App\Livewire\Information\Statuses\Relatives;

use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;
use App\Services\Dashboard\Information\Statuses\RelativeStatuses\Restore\RelativeStatusRestoreService;
use Exception;
use Illuminate\View\View;
use Livewire\Component;

class Restore extends Component
{
    use DispatchingTrait;

    public RelativeStatus $relativeStatus;

    /**
     * @throws Exception
     */
    public function restore(): void
    {
        $service = new RelativeStatusRestoreService($this->relativeStatus);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-rotate-left text-primary', 'restored-successfully', "<b>Relative status restored:</b> {$this->relativeStatus->translation->translation}");
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.information.statuses.relatives.restore');
    }
}
