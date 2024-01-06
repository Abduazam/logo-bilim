<?php

namespace App\Livewire\Information\Statuses\Relatives;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;
use App\Livewire\Information\Statuses\Relatives\Forms\RelativeStatusUpdateForm;
use App\Services\Dashboard\Information\Statuses\Relatives\Update\RelativeStatusUpdateService;

class Update extends Component
{
    use DispatchingTrait;

    public RelativeStatus $relativeStatus;
    public RelativeStatusUpdateForm $form;

    public function mount(): void
    {
        $this->form->setValues($this->relativeStatus);
    }

    /**
     * @throws Exception
     */
    public function update(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new RelativeStatusUpdateService($validatedData, $this->relativeStatus);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatchMany(['refresh', 'updated']);
                $this->dispatchSuccess('fa fa-pen text-info', 'updated-successfully', "<b>Relative status updated:</b> {$this->form->title}");
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.information.statuses.relatives.update');
    }
}
