<?php

namespace App\Repositories\Dashboard\Features\TableColumns\Columns;

use App\Models\Dashboard\Features\TableColumns\Columns\Column;
use App\Repositories\Dashboard\Features\TableColumns\Tables\TableRepository;
use Illuminate\Database\Eloquent\Collection;

class ColumnRepository
{
    protected TableRepository $repository;

    public function __construct()
    {
        $this->repository = new TableRepository();
    }

    public function getAll(): Collection
    {
        return Column::select('name')->get();
    }

    public function getOne(): Column
    {
        return Column::first();
    }

    public function getVisibleColumns(): Collection
    {
        return $this->repository->getVisibleColumns('columns');
    }

    public function getActiveColumns(): array
    {
        return $this->repository->getActiveColumns('columns');
    }
}
