<?php

namespace App\View\Components\Forms\Buttons\Default;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Back extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(protected string $route)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.buttons.default.back', [
            'route' => $this->route,
        ]);
    }
}
