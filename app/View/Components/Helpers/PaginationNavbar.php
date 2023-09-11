<?php

namespace App\View\Components\Helpers;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PaginationNavbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected $data
    ) { }

    public function getTotal()
    {
        return $this->data->total();
    }

    public function getFrom(): float|int
    {
        $currentPage = $this->data->currentPage();
        $perPage = $this->data->perPage();

        return ($currentPage - 1) * $perPage + 1;
    }

    public function getTo(): mixed
    {
        $currentPage = $this->data->currentPage();
        $perPage = $this->data->perPage();

        return min($currentPage * $perPage, $this->getTotal());
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.helpers.pagination-navbar', [
            'data' => $this->data,
            'total' => $this->getTotal(),
            'from' => $this->getFrom(),
            'to' => $this->getTo(),
        ]);
    }
}
