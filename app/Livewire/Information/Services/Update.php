<?php

namespace App\Livewire\Information\Services;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Information\Services\Service;
use App\Livewire\Information\Services\Forms\ServiceUpdateForm;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Services\Update\ServiceUpdateService;

class Update extends Component
{
    use DispatchingTrait;

    public Service $service;
    public ServiceUpdateForm $form;

    public function mount(): void
    {
        $this->form->setValues($this->service);
    }

    /**
     * @throws Exception
     */
    public function update(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $title = $this->service->title;

            $service = new ServiceUpdateService($validatedData, $this->service);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatchMany(['refresh', 'updated']);
                $this->dispatchForUpdate('service', $title . ' => ' . $this->form->title);
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.information.services.update');
    }
}
