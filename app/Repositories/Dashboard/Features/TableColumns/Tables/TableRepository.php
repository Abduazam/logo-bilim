<?php

namespace App\Repositories\Dashboard\Features\TableColumns\Tables;

use App\Models\Dashboard\Features\TableColumns\Tables\Table;

class TableRepository
{
    public function getFiltered(
        string $search,
        int $perPage,
        string $orderBy,
        string $orderDirection,
    ) {
        $result = Table::select(['id', 'name', 'created_at'])
            ->withCount('columns')
            ->when($search, fn ($query, $search) => $query->where('name', 'like', '%' . $search . '%'))
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $result->get() : $result->paginate($perPage);
    }
}
