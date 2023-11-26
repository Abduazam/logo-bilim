<?php

namespace App\Repositories\Dashboard\Information\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Models\Dashboard\Information\Services\Service;

class ServiceRepository
{
    public function getAll(): Collection
    {
        return Service::all();
    }

    public function getNotChosenAll(Branch $branch)
    {
        return Service::whereNotIn('id', $branch->services->pluck('id'))->get();
    }

    public function getByNotTheseIds(array $ids)
    {
        return Service::whereNotIn('id', $ids)->get();
    }

    public function getFiltered(
        string $search,
        int $perPage,
        bool $with_trashed,
        string $orderBy,
        string $orderDirection,
    ) {
        $branches = Service::select(['id', 'title', 'created_at', 'deleted_at'])
            ->withCount('branches', 'teachers')
            ->when($with_trashed, fn ($query) => $query->onlyTrashed())
            ->when($search, fn ($query) => $query->where('title', 'like', "%$search%"))
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $branches->get() : $branches->paginate($perPage);
    }
}
