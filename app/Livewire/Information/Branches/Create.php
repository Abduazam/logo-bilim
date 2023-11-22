<?php

namespace App\Livewire\Information\Branches;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Livewire\Information\Branches\Forms\BranchCreateForm;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Branches\Create\BranchCreateService;

class Create extends Component
{
    use DispatchingTrait;

    public BranchCreateForm $form;

    /**
     * @throws Exception
     */
    public function create(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new BranchCreateService($validatedData);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatch('refresh');
                $this->dispatchSuccess('fa fa-check text-success', 'created-successfully', "<b>New branch:</b> {$this->form->title}");
                $this->form->reset();
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.information.branches.create');
    }
}
