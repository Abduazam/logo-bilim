<?php

namespace App\Repositories\Dashboard\Features\TableColumns\Tables;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Dashboard\Features\TableColumns\Tables\Table;

class TableRepository
{
    public function getAll()
    {
        return Table::select('name')->get();
    }

    public function getVisibleColumns(string $table_name): Collection
    {
        return $this->getColumns($table_name, ['visible' => true]);
    }

    public function getActiveColumns(string $table_name): array
    {
        return array_values($this->getColumns($table_name, ['active' => true])->pluck('name')->toArray());
    }

    private function getColumns(string $table_name, array $condition): Collection
    {
        return Table::where('name', $table_name)
            ->with(['columns' => fn ($query) => $query->where($condition)->orderBy('id')])
            ->firstOrFail()
            ->columns;
    }

    public function getFiltered(
        string $search,
        int $perPage,
        string $orderBy,
        string $orderDirection,
    ) {
        $tables = Table::select($this->getActiveColumns('tables'))
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $tables->get() : $tables->paginate($perPage);
    }
}
