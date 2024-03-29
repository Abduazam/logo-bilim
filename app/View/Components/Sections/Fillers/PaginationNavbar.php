<?php

namespace App\View\Components\Sections\Fillers;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PaginationNavbar extends Component
{
    protected int $currentPage = 0;
    protected int $perPage = 0;

    /**
     * Create a new component instance.
     */
    public function __construct(
        protected $data
    ) {
        if ($this->data instanceof LengthAwarePaginator) {
            $this->currentPage = $this->data->currentPage();
            $this->perPage = $this->data->perPage();
        }
    }

    public function getTotal(): int
    {
        if ($this->data instanceof Collection) {
            return $this->data->count();
        } elseif ($this->data instanceof LengthAwarePaginator) {
            return $this->data->total();
        } else {
            return 0;
        }
    }

    public function getFrom(): float|int
    {
        return $this->getTotal() > 0 ? ($this->currentPage - 1) * $this->perPage + 1 : 0;
    }

    public function getTo(): mixed
    {
        if ($this->data instanceof LengthAwarePaginator) {
            return min($this->currentPage * $this->perPage, $this->getTotal());
        } else {
            return $this->getTotal();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.fillers.pagination-navbar', [
            'data' => $this->data,
            'total' => $this->getTotal(),
            'from' => $this->getFrom(),
            'to' => $this->getTo(),
        ]);
    }
}
