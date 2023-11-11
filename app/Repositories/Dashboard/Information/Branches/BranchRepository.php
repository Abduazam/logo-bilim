<?php

namespace App\Repositories\Dashboard\Information\Branches;

use App\Models\Dashboard\Information\Branches\Branch;

class BranchRepository
{
    public function getFiltered(
        string $search,
        int $perPage,
        bool $with_trashed,
        string $orderBy,
        string $orderDirection,
    ) {
        $branches = Branch::select(['id', 'title', 'created_at', 'deleted_at'])
            ->when($with_trashed, fn ($query) => $query->onlyTrashed())
            ->when($search, fn ($query) => $query->where('title', 'like', "%$search%"))
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $branches->get() : $branches->paginate($perPage);
    }
}
