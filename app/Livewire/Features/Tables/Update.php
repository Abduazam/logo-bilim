<?php

namespace App\Livewire\Features\Tables;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Features\TableColumns\Tables\Table;

class Update extends Component
{
    public Table $table;

    public function render(): View
    {
        return view('livewire.features.tables.update');
    }
}
