<?php

namespace App\Livewire\Components\Forms\Tables;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\Reactive;
use Illuminate\Database\Eloquent\Collection;
use App\Contracts\Enums\General\Braces\CurlyBracesEnum;
use App\Contracts\Interfaces\Components\Forms\Tables\TableInterface;

class Table extends Component implements TableInterface
{
    #[Reactive]
    public Collection $data;
    public array $columns;
    public array $buttons;
    public string $model;

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

    public function placeholder(): string
    {
        return <<<'HTML'
            <div class="d-flex align-items-center justify-content-center mb-4">
                <i class="far fa-2x fa-sun fa-spin me-3"></i> Loading data..
            </div>
        HTML;
    }

    public function render(): View
    {
        return view('livewire.components.forms.tables.table');
    }
}
