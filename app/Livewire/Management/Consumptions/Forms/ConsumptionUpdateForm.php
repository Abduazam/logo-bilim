<?php

namespace App\Livewire\Management\Consumptions\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\Management\Consumptions\Consumption;

class ConsumptionUpdateForm extends Form
{
    #[Validate('required|numeric|exists:branches,id')]
    public ?int $branch_id = null;

    #[Validate('required|numeric')]
    public ?int $amount = null;

    #[Validate('required|string|min:3')]
    public ?string $comment = null;

    public function setValues(Consumption $consumption): void
    {
        $this->branch_id = $consumption->branch_id;
        $this->amount = $consumption->amount;
        $this->comment = $consumption->comment;
    }
}
