<?php

namespace App\Livewire\Features\Tables;

use Livewire\Component;
use Illuminate\View\View;
use App\Helpers\Services\ColumnsService\getColumnsService;

class Index extends Component
{
    public function render(getColumnsService $service): View
    {
        // return view('livewire.features.tables.index', [
        //     'columns' => $service->getVisibleColumns('tables')
        // ]);

        return view('livewire.features.tables.index');
    }
}
