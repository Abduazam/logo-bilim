<?php

namespace App\View\Components\Sections\Fillers;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActiveInactive extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.fillers.active-inactive');
    }
}
