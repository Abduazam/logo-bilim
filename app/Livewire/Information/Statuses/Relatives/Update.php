<?php

namespace App\Livewire\Information\Statuses\Relatives;

use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Livewire\Information\Statuses\Relatives\Forms\RelativeStatusUpdateForm;
use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;
use App\Services\Dashboard\Information\Statuses\RelativeStatuses\Update\RelativeStatusUpdateService;
use Exception;
use Illuminate\View\View;
use Livewire\Component;

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
                $this->dispatchSuccess('fa fa-pen text-info', 'updated-successfully', "<b>Relative status updated:</b><br>{$this->relativeStatus->translation->translation} => {$this->form->translations[app()->getLocale()]}");
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
