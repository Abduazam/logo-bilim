<?php

namespace App\View\Components\Sections\Fillers;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class NavList extends Component
{
    protected Request $request;
    /**
     * Create a new component instance.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.fillers.nav-list', [
            'request' => $this->request
        ]);
    }
}
