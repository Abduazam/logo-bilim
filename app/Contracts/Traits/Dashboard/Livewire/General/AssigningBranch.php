<?php

namespace App\Contracts\Traits\Dashboard\Livewire\General;

use Livewire\Attributes\Rule;

trait AssigningBranch
{
    #[Rule('nullable|numeric|exists:branches,id')]
    public ?int $branch_id = null;

    public array $branches = [];

    public function addBranch(int $id): void
    {
        $this->form->chosen_branches[$id] = $this->branches[$id];
        unset($this->branches[$id]);
        $this->resetBranchId();
    }

    public function removeBranch(int $id): void
    {
        $this->branches[$id] = $this->form->chosen_branches[$id];
        unset($this->form->chosen_branches[$id]);
        ksort($this->branches);
        $this->resetBranchId();
    }

    private function resetBranchId(): void
    {
        $this->branch_id = null;
    }
}
