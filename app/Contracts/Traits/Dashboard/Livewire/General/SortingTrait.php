<?php

namespace App\Contracts\Traits\Dashboard\Livewire\General;

trait SortingTrait
{
    public string $orderBy = '';
    public string $orderDirection = 'asc';

    public function sortBy($field): void
    {
        $this->orderDirection = $this->orderBy === $field ? $this->reverseDirection() : 'asc';
        $this->orderBy = $field;
    }

    public function reverseDirection(): string
    {
        return $this->orderDirection === 'asc' ? 'desc' : 'asc';
    }

    public function sortUp($field): bool
    {
        return $field === $this->orderBy and $this->orderDirection === 'asc';
    }

    public function sortDown($field): bool
    {
        return $field === $this->orderBy and $this->orderDirection === 'desc';
    }
}
