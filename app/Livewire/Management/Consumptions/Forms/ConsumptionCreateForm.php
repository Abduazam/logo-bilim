<?php

namespace App\Livewire\Management\Consumptions\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class ConsumptionCreateForm extends Form
{
    #[Validate('required|numeric|exists:branches,id')]
    public ?int $branch_id = null;

    #[Validate('required|numeric')]
    public ?int $amount = null;

    #[Validate('required|string|min:3')]
    public ?string $comment = null;

    public function setBranch(int $branch_id): void
    {
        $this->branch_id = $branch_id;
    }
}
