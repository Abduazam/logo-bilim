<?php

namespace App\Livewire\Information\Branches;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Livewire\Information\Branches\Forms\BranchUpdateForm;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Branches\Update\BranchUpdateService;

class Update extends Component
{
    use DispatchingTrait;

    public Branch $branch;
    public BranchUpdateForm $form;

    public function mount(): void
    {
        $this->form->setValues($this->branch);
    }

    /**
     * @throws Exception
     */
    public function update(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $title = $this->branch->title;

            $service = new BranchUpdateService($validatedData, $this->branch);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatchMany(['refresh', 'updated']);
                $this->dispatchSuccess('fa fa-pen text-info', 'updated-successfully', "<b>Branch updated:</b> {$title} => {$this->form->title}");
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
