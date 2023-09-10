<?php

namespace App\View\Components\Forms\Images;

use App\Livewire\Features\Languages\Forms\LanguageForm;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TemporaryImage extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected LanguageForm $form,
        protected string $model,
        protected $item = null,
        protected ?string $method = null,
        protected string $class = 'w-100',
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.images.temporary-image', [
            'form' => $this->form,
            'model' => $this->model,
            'item' => $this->item,
            'method' => $this->method,
            'class' => $this->class,
        ]);
    }
}
