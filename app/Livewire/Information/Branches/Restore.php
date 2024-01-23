<?php

namespace App\Livewire\Information\Branches;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Branches\Restore\BranchRestoreService;

class Restore extends Component
{
    use DispatchingTrait;

    public Branch $branch;

    /**
     * @throws Exception
     */
    public function restore(): void
    {
        $service = new BranchRestoreService($this->branch);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchForRestore('branch', $this->branch->title);
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.information.branches.restore');
    }
}
