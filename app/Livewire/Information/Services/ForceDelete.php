<?php

namespace App\Livewire\Information\Services;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Information\Services\Service;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Services\ForceDelete\ServiceForceDeleteService;

class ForceDelete extends Component
{
    use DispatchingTrait;

    public Service $service;

    /**
     * @throws Exception
     */
    public function forceDelete(): void
    {
        $service = new ServiceForceDeleteService($this->service);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-trash text-danger', 'force-deleted-successfully', "<b>Service completely deleted:</b> {$this->service->title}");
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.information.services.force-delete');
    }
}
