<?php

namespace App\Traits\Livewire\General;

trait WithTrashedTrait
{
    public int $with_trashed = 2;

    public array $trashed_data = [
        0 => "Active",
        1 => "Trashed",
        2 => "All"
    ];
}
