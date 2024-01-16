<?php

namespace App\Livewire\Management\Consumptions;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use App\Models\Dashboard\Management\Consumptions\Consumption;
use App\Repositories\Dashboard\Information\Branches\BranchRepository;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Livewire\Management\Consumptions\Forms\ConsumptionUpdateForm;
use App\Services\Dashboard\Management\Consumptions\Update\ConsumptionUpdateService;

class Update extends Component
{
    use DispatchingTrait;

    public Consumption $consumption;

    public ConsumptionUpdateForm $form;

    public function mount(): void
    {
        $this->form->setValues($this->consumption);
    }

    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function update(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new ConsumptionUpdateService($validatedData, $this->consumption);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatchMany(['refresh', 'updated']);
                $this->dispatchSuccess('fa fa-pen text-info', 'updated-successfully', "<b>Consumption updated:</b> {$this->form->comment}");
            } else {
                throw $response;
            }
        }
    }

    public function render(BranchRepository $branchRepository): View
    {
        $branches = $branchRepository->getByUser(auth()->user());

        return view('livewire.management.consumptions.update', [
            'branches' => $branches,
        ]);
    }
}
