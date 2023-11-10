<?php

namespace App\Livewire\Components\Sections\Fillers;

use Livewire\Component;
use Illuminate\View\View;

class Placeholder extends Component
{
    public function render(): View
    {
        return view('components.sections.fillers.livewire.placeholder');
    }
}
