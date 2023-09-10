<?php

namespace App\View\Components\Livewire\Filter;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected string $model,
        protected array $data,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.livewire.filter.select', [
            'model' => $this->model,
            'data' => $this->data,
        ]);
    }
}
