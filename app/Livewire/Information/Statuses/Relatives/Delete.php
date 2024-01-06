<?php

namespace App\Livewire\Information\Statuses\Relatives;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;
use App\Services\Dashboard\Information\Statuses\Relatives\Delete\RelativeStatusDeleteService;

class Delete extends Component
{
    use DispatchingTrait;

    public RelativeStatus $relativeStatus;

    /**
     * @throws Exception
     */
    public function delete(): void
    {
        $service = new RelativeStatusDeleteService($this->relativeStatus);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-trash text-danger', 'deleted-successfully', "<b>Relative status deleted:</b> {$this->relativeStatus->title}");
        } else {
            throw $response;
        }
    }

    #[On('updated')]
    public function render(): View
    {
        return view('livewire.information.statuses.relatives.delete');
    }
}
