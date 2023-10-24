<?php

namespace App\Livewire\Features\Tables\Columns;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Collection;
use App\Helpers\Services\ColumnsService\getColumnsService;
use App\Models\Dashboard\Features\TableColumns\Columns\Column;
use App\Models\Dashboard\Features\TableColumns\Columns\ColumnTranslation;

class Index extends Component
{
    public Collection $table_columns;

    public function updateSortable(Column $column): void
    {
        $column->update([
            'sortable' => !$column->sortable,
        ]);
    }

    public function updateVisible(Column $column): void
    {
        $column->update([
            'visible' => !$column->visible,
        ]);
    }

    public function updateTranslation(ColumnTranslation $translation, string $value = ''): void
    {
        $translation->update([
            'translation' => $value ?: null,
        ]);
    }

    public function render(getColumnsService $service): View
    {
        return view('livewire.features.tables.columns.index', [
            'columns' => $service->getVisibleColumns('columns')
        ]);
    }
}
