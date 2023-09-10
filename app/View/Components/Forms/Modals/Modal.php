<?php

namespace App\View\Components\Forms\Modals;

use App\Contracts\Interfaces\Components\Forms\Modals\ModalInterface;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component implements ModalInterface
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected array $data,
        protected string $target,
        protected string $action,
        protected string $model,
    ) { }

    public function getSize()
    {
        return $this->data['size'];
    }

    public function getButtons()
    {
        return $this->data['buttons'];
    }

    public function getHeadTitle(): string
    {
        return $this->action . ' ' . $this->model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.modals.modal', [
            'target' => $this->target,
            'action' => $this->action,
            'size' => $this->getSize(),
            'title' => $this->getHeadTitle(),
            'buttons' => $this->getButtons(),
        ]);
    }
}
