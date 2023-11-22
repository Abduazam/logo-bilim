<?php

namespace App\Livewire\Information\Branches;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Livewire\Information\Branches\Forms\BranchUpdateForm;
use App\Livewire\Information\Branches\Traits\ActionOnServices;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Repositories\Dashboard\Information\Services\ServiceRepository;
use App\Services\Dashboard\Information\Branches\Update\BranchUpdateService;

class Update extends Component
{
    use DispatchingTrait, ActionOnServices;

    public Branch $branch;
    public BranchUpdateForm $form;

    public function mount(ServiceRepository $serviceRepository): void
    {
        $this->services = $serviceRepository->getNotChosenAll($this->branch)->pluck('title', 'id')->map(function ($title) {
            return [
                'title' => $title,
                'price' => null,
            ];
        })->all();
        $this->form->setValues($this->branch);
    }

    /**
     * @throws Exception
     */
    public function update(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new BranchUpdateService($validatedData, $this->branch);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatchMany(['refresh', 'updated']);
                $this->dispatchSuccess('fa fa-pen text-info', 'updated-successfully', "<b>Branch updated:</b> {$this->form->title}");
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.information.branches.update');
    }
}
