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
        ],
    ];

    public function getColumnKeys(): array
    {
        return array_keys($this->columns);
    }
}
