<?php

namespace App\Repositories\Dashboard\Information\Services;

use Illuminate\Support\Facades\DB;
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

    public function getByBranch(int $branch_id)
    {
        return (Branch::findOrFail($branch_id))->services;
    }

    public function getByUserBranch()
    {
        $branchIds = auth()->user()->branches->pluck('id')->toArray();

        return Service::whereHas('branches', function ($query) use ($branchIds) {
            $query->whereIn('branch_id', $branchIds);
        })->get();
    }

    public function getFiltered(
        string $search,
        int $perPage,
        bool $with_trashed,
        string $orderBy,
        string $orderDirection,
    ) {
        $result = Service::select(['id', 'title', 'created_at', 'deleted_at'])
            ->withCount('branches', 'teachers')
            ->when($with_trashed, fn ($query) => $query->onlyTrashed())
            ->when($search, function ($query, $search) {
                $search = strtolower($search);

                $query->where(DB::raw('LOWER(title)'), 'like', "%$search%");
            })
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $result->get() : $result->paginate($perPage);
    }
}
