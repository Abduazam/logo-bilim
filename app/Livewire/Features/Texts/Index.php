<?php

namespace App\Livewire\Features\Texts;

use Livewire\Component;
use Illuminate\View\View;
use App\Helpers\Services\ColumnsService\getColumnsService;

class Index extends Component
{
    public function render(getColumnsService $service): View
    {
        // return view('livewire.features.texts.index', [
        //     'columns' => $service->getVisibleColumns('texts')
        // ]);

        return view('livewire.features.texts.index');
    }
}
