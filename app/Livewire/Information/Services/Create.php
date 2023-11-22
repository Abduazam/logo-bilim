<?php

namespace App\Livewire\Information\Services;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Livewire\Information\Services\Forms\ServiceCreateForm;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Services\Create\ServiceCreateService;

class Create extends Component
{
    use DispatchingTrait;

    public ServiceCreateForm $form;

    /**
     * @throws Exception
     */
    public function create(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new ServiceCreateService($validatedData);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatch('refresh');
                $this->dispatchSuccess('fa fa-check text-success', 'created-successfully', "<b>New service:</b> {$this->form->title}");
                $this->form->reset();
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.information.services.create');
    }
}
