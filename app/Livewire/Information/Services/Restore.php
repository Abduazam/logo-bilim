<?php

namespace App\Livewire\Information\Services;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Information\Services\Service;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Services\Restore\ServiceRestoreService;

class Restore extends Component
{
    use DispatchingTrait;

    public Service $service;

    /**
     * @throws Exception
     */
    public function restore(): void
    {
        $service = new ServiceRestoreService($this->service);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-rotate-left text-primary', 'restored-successfully', "<b>Service restored:</b> {$this->service->title}");
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.information.services.restore');
    }
}
