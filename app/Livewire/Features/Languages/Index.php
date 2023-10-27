<?php

namespace App\Livewire\Features\Languages;

use Livewire\Component;
use Illuminate\View\View;
use App\Helpers\Services\ColumnsService\getColumnsService;

class Index extends Component
{
    public function render(getColumnsService $service): View
    {
        // return view('livewire.features.languages.index', [
        //     'columns' => $service->getVisibleColumns('languages'),
        // ]);

        return view('livewire.features.languages.index');
    }
}
