<?php

namespace App\Traits\Livewire\General;

trait SortTrait
{
    public string $orderBy = 'id';
    public string $orderDirection = 'asc';

    public function sortBy($column): void
    {
        $this->orderDirection = $this->orderBy === $column ? $this->swapSortDirection() : 'asc';
        $this->orderBy = $column;
    }

    public function swapSortDirection(): string
    {
        return $this->orderDirection === 'asc' ? 'desc' : 'asc';
    }
}
