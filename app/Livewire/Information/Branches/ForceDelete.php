<?php

namespace App\Livewire\Information\Branches;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Branches\ForceDelete\BranchForceDeleteService;

class ForceDelete extends Component
{
    use DispatchingTrait;

    public Branch $branch;

    /**
     * @throws Exception
     */
    public function forceDelete(): void
    {
        $service = new BranchForceDeleteService($this->branch);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchForForceDelete('branch', $this->branch->title);
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.information.branches.force-delete');
    }
}
