<?php

namespace App\Traits\Livewire\General;

use Livewire\WithPagination;

trait PaginationTrait
{
    use WithPagination;

    public int $perPage = 2;

    public array $perPages = [
        2 => 2,
        30 => 30,
        50 => 50,
        0 => "All",
    ];
}
