<?php

namespace App\Repositories\Dashboard\Features\Texts;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Dashboard\Features\Texts\Text;

class TextRepository
{
    public function getAll(): Collection
    {
        return Text::all();
    }

    public function getFiltered(
        string $search,
        int $perPage,
        string $orderBy,
        string $orderDirection,
    ) {
        $tables = Text::select(['id', 'key', 'icon', 'created_at'])
            ->with('translation')
            ->when($search, function ($query, $search) {
                $query->where('key', 'like', '%' . $search . '%')
                    ->orWhereHas('translation', function ($subquery) use ($search) {
                        $subquery->where('translation', 'like', '%' . $search . '%');
                    });
            })
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $tables->get() : $tables->paginate($perPage);
    }
}
