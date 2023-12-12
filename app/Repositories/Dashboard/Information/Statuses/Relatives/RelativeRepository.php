<?php

namespace App\Repositories\Dashboard\Information\Statuses\Relatives;

use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;
use Illuminate\Database\Eloquent\Collection;

class RelativeRepository
{
    public function getAll(): Collection
    {
        return RelativeStatus::with('translation')->get();
    }

    public function getFiltered(
        string $search,
        int $perPage,
        bool $with_trashed,
        string $orderBy,
        string $orderDirection,
    ) {
        $result = RelativeStatus::select(['id', 'created_at', 'deleted_at'])
            ->with('translation')
            ->withCount('translations')
            ->when($with_trashed, fn ($query) => $query->onlyTrashed())
            ->when($search, fn ($query) => $query->whereHas('translation', fn ($translationQuery) => $translationQuery->where('translation', 'like', "%$search%")))
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $result->get() : $result->paginate($perPage);
    }
}
