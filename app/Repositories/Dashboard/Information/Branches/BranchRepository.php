<?php

namespace App\Repositories\Dashboard\Information\Branches;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Models\Dashboard\Information\Branches\Branch;

class BranchRepository
{
    public function getAll(): Collection
    {
        return Branch::all();
    }

    public function getNotChosenAll(User $user)
    {
        return Branch::whereNotIn('id', $user->branches->pluck('id'))->get();
    }

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
