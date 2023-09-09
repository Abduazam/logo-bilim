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
            ]
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
            ]
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
            ]
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
            ]
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
            ]
        ],
    ];

    public function getColumnKeys(): array
    {
        return array_keys($this->columns);
    }
}
