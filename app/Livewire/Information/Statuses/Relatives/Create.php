<?php

namespace App\Livewire\Information\Statuses\Relatives;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Livewire\Information\Statuses\Relatives\Forms\RelativeStatusCreateForm;
use App\Services\Dashboard\Information\Statuses\Relatives\Create\RelativeStatusCreateService;

class Create extends Component
{
    use DispatchingTrait;

    public RelativeStatusCreateForm $form;

    /**
     * @throws Exception
     */
    public function create(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new RelativeStatusCreateService($validatedData);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatch('refresh');
                $this->dispatchSuccess('fa fa-check text-success', 'created-successfully', "<b>New relative status:</b> {$this->form->title}");
                $this->form->reset();
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.information.statuses.relatives.create');
    }
}
