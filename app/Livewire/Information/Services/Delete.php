<?php

namespace App\Livewire\Information\Services;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;
use App\Models\Dashboard\Information\Services\Service;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Services\Delete\ServiceDeleteService;

class Delete extends Component
{
    use DispatchingTrait;

    public Service $service;

    /**
     * @throws Exception
     */
    public function delete(): void
    {
        $service = new ServiceDeleteService($this->service);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchForDelete('service', $this->service->title);
        } else {
            throw $response;
        }
    }

    #[On('updated')]
    public function render(): View
    {
        return view('livewire.information.services.delete');
    }
}
