<?php

namespace App\Contracts\Interfaces\Traits\Livewire\Models;

interface ColumnsInterface
{
    public function getColumnKeys(): array;

    public function getSearchableKeys(): array;
}
