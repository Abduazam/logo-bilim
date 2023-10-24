<?php

namespace App\Repositories\Dashboard\Features\TableColumns\Tables;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Dashboard\Features\TableColumns\Tables\Table;

class TableRepository
{
    public function getAll(): Collection
    {
        return Table::all();
    }

    public function getFiltered(
        string $search,
        int $perPage,
        string $orderBy,
        string $orderDirection,
    ) {
        $tables = Table::select(['id', 'name', 'created_at'])
            ->withCount('columns')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $tables->get() : $tables->paginate($perPage);
    }
}
