<?php

namespace App\Livewire\Information\Branches;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Branches\Delete\BranchDeleteService;

class Delete extends Component
{
    use DispatchingTrait;

    public Branch $branch;

    /**
     * @throws Exception
     */
    public function delete(): void
    {
        $service = new BranchDeleteService($this->branch);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchForDelete('branch', $this->branch->title);
        } else {
            throw $response;
        }
    }

    #[On('updated')]
    public function render(): View
    {
        return view('livewire.information.branches.delete');
    }
}
