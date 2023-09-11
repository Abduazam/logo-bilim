<?php

namespace App\View\Components\Actions\Modals;

use App\Contracts\Interfaces\Components\Actions\Modals\ActionsInterface;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Open extends Component implements ActionsInterface
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected array $data,
        protected string $model,
        protected string $action,
        protected ?string $text = null,
        protected ?string $icon = null,
    ) { }

    public function getModalTarget()
    {
        return $this->data['target'];
    }

    public function getModalProperties()
    {
        return $this->data['modal'];
    }

    public function getButtonProperties()
    {
        return $this->data['style'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.actions.modals.open', [
            'target' => $this->getModalTarget(),
            'button' => $this->getButtonProperties(),
            'modal' => $this->getModalProperties(),
            'model' => $this->model,
            'action' => $this->action,
            'text' => $this->text,
            'icon' => $this->icon,
        ]);
    }
}
