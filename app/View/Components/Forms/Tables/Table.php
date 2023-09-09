<?php

namespace App\View\Components\Forms\Tables;

use App\Contracts\Enums\General\Braces\CurlyBracesEnum;
use App\Contracts\Interfaces\Components\Forms\Tables\TableInterface;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component implements TableInterface
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected $data,
        protected array $columns,
        protected string $model,
    ) { }

    public function getColumnNames(): array
    {
        return array_keys($this->columns);
    }

    public function getColumnMethod($column): string|null
    {
        if ($this->columns[$column]['method']['active']) {
            return $this->columns[$column]['method']['name'];
        }

        return null;
    }

    public function getColumnMethodBrace($column): bool
    {
        return match ($this->columns[$column]['method']['braces']) {
            CurlyBracesEnum::SINGLE_CURLY_BRACE => true,
            default => false
        };
    }

    public function getColumnMethodClass($column): string|null
    {
        return $this->columns[$column]['method']['class'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.tables.table', [
            'data' => $this->data,
            'columns' => $this->getColumnNames(),
            'model' => $this->model,
        ]);
    }
}
