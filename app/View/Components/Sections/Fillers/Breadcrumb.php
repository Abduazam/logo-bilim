<?php

namespace App\View\Components\Sections\Fillers;

use App\Helpers\Classes\Breadcrumbs\Segment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    protected Request $request;

    /**
     * Create a new component instance.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function segments(): array
    {
        return collect($this->request->segments())->map(function ($segment) {
            return new Segment($this->request, $segment);
        })->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.fillers.breadcrumb', [
            'segments' => $this->segments()
        ]);
    }
}
