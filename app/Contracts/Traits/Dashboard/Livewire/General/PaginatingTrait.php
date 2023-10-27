<?php

namespace App\Contracts\Traits\Dashboard\Livewire\General;

use Livewire\WithPagination;

trait PaginatingTrait
{
    use WithPagination;

    public int $perPage = 5;
}
