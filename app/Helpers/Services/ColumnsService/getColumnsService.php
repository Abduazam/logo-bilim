<?php

namespace App\Helpers\Services\ColumnsService;

use App\Models\Dashboard\Features\TableColumns\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class getColumnsService
{
    public function getVisibleColumns(string $table_name): Collection
    {
        return $this->getColumns($table_name, ['visible' => true]);
    }

    public function getSortableColumns(string $table_name): Collection
    {
        return $this->getColumns($table_name, ['sortable' => true]);
    }

    private function getColumns(string $table_name, array $condition): Collection
    {
        return Table::where('name', $table_name)
            ->with(['columns' => fn ($query) => $query->where($condition)->with('translation')])
            ->firstOrFail()?->columns;
    }
}
