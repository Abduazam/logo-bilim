<?php

namespace App\Repositories\Dashboard\Features\TableColumns\Columns;

use App\Models\Dashboard\Features\TableColumns\Columns\Column;
use App\Repositories\Dashboard\Features\TableColumns\Tables\TableRepository;
use Illuminate\Database\Eloquent\Collection;

class ColumnRepository
{
    public function getAll(): Collection
    {
        return Column::all();
    }

    public function getOne(): Column
    {
        return Column::first();
    }
}
