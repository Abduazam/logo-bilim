<?php

namespace App\Traits\Livewire\Models\Features\Languages;

use App\Contracts\Enums\General\Braces\CurlyBracesEnum;

trait ColumnsTrait
{
    public array $columns = [
        'id' => [
            'sort' => [
                'active' => false,
            ],
            'method' => [
                'active' => false,
                'name' => null,
                'braces' => null,
                'class' => null,
            ],
            'visible' => true,
            'searchable' => false,
        ],
        'thumbnail' => [
            'sort' => [
                'active' => false,
            ],
            'method' => [
                'active' => true,
                'name' => 'getThumbnail',
                'braces' => CurlyBracesEnum::SINGLE_CURLY_BRACE,
                'class' => null,
            ],
            'visible' => true,
            'searchable' => false,
        ],
        'slug' => [
            'sort' => [
                'active' => false,
            ],
            'method' => [
                'active' => false,
                'name' => null,
                'braces' => null,
                'class' => null,
            ],
            'visible' => true,
            'searchable' => true,
        ],
        'title' => [
            'sort' => [
                'active' => false,
            ],
            'method' => [
                'active' => false,
                'name' => null,
                'braces' => null,
                'class' => null,
            ],
            'visible' => true,
            'searchable' => true,
        ],
        'created_at' => [
            'sort' => [
                'active' => false,
            ],
            'method' => [
                'active' => false,
                'name' => null,
                'braces' => null,
                'class' => null,
            ],
            'visible' => true,
            'searchable' => false,
        ],
        'deleted_at' => [
            'sort' => [
                'active' => false,
            ],
            'method' => [
                'active' => false,
                'name' => null,
                'braces' => null,
                'class' => null,
            ],
            'visible' => false,
            'searchable' => false,
        ],
    ];

    public function getColumnKeys(): array
    {
        return array_keys($this->columns);
    }

    public function getSearchableKeys(): array
    {
        return array_keys(array_filter($this->columns, function ($column) {
            return $column['searchable'] === true;
        }));
    }
}
