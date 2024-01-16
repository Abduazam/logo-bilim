<?php

namespace App\Livewire\Management\Consumptions;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Livewire\Management\Consumptions\Forms\ConsumptionCreateForm;
use App\Repositories\Dashboard\Information\Branches\BranchRepository;
use App\Services\Dashboard\Management\Consumptions\Create\ConsumptionCreateService;

class CreateInOutside extends Component
{
    use DispatchingTrait;

    public ConsumptionCreateForm $form;

    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function create(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new ConsumptionCreateService($validatedData);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatch('consumption-in-outside');
                $this->dispatchSuccess('fa fa-check text-success', 'created-successfully', "<b>New consumption:</b> {$this->form->comment}");
                $this->form->reset();
            } else {
                throw $response;
            }
        }
    }

    public function render(BranchRepository $branchRepository): View
    {
        $branches = $branchRepository->getByUser(auth()->user());
        if (count($branches) == 1) {
            $this->form->setBranch($branches->first()->id);
        }

        return view('livewire.management.consumptions.create-in-outside', [
            'branches' => $branches,
        ]);
    }
}
