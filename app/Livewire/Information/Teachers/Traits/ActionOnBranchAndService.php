<?php

namespace App\Livewire\Information\Teachers\Traits;

use Livewire\Attributes\Validate;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Models\Dashboard\Information\Services\Service;
use App\Repositories\Dashboard\Information\Services\ServiceRepository;

trait ActionOnBranchAndService
{
    public array $branches = [];
    public array $services = [];

    #[Validate('nullable|numeric|exists:branches,id')]
    public ?int $branch_id = null;
    #[Validate('nullable|numeric|exists:services,id')]
    public ?int $service_id = null;

    public function addBranch(int $branch_id): void
    {
        $ids = [];
        if (array_key_exists($branch_id, $this->form->teacher_services)) {
            $ids = array_keys($this->form->teacher_services[$branch_id]);
        }

        $this->services = (new ServiceRepository())->getByNotTheseIds($ids)->pluck('title', 'id')->all();
    }

    public function addService(Service $service): void
    {
        $branch = Branch::findOrFail($this->branch_id);

        $this->form->teacher_services[$branch->id][$service->id] = [
            'branch_title' => $branch->title,
            'service_title' => $service->title,
            'price' => $service->getPrice($branch->id),
            'salary' => null,
        ];

        unset($this->services[$service->id]);
        $this->resetServiceId();

        if (empty($this->services)) {
            unset($this->branches[$this->branch_id]);
            $this->resetBranchId();
        }
    }

    public function removeService(Branch $branch, Service $service): void
    {
        if (isset($this->form->teacher_services[$branch->id][$service->id])) {
            unset($this->form->teacher_services[$branch->id][$service->id]);
            $this->services[$service->id] = $service->title;
        }

        if (!array_key_exists($branch->id, $this->branches)) {
            $this->branches[$branch->id] = $branch->title;
        }
    }

    private function resetBranchId(): void
    {
        $this->branch_id = null;
    }

    private function resetServiceId(): void
    {
        $this->service_id = null;
    }
}
