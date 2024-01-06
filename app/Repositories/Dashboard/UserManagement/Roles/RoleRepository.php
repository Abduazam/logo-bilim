<?php

namespace App\Repositories\Dashboard\UserManagement\Roles;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Dashboard\UserManagement\Roles\Role;

class RoleRepository
{
    public function getAll(): Collection
    {
        return Role::whereNotIn('name', ['super-admin', 'admin'])->get();
    }

    public function getFiltered(
        string $search,
        int $perPage,
        bool $with_trashed,
        string $orderBy,
        string $orderDirection,
    ) {
        $result = Role::select(['id', 'name', 'created_at', 'deleted_at'])
            ->withCount('permissions', 'users')
            ->when($with_trashed, fn ($query) => $query->onlyTrashed())
            ->when($search, function ($query, $search) {
                $search = strtolower($search);

                $query->where(DB::raw('LOWER(name)'), 'like', "%$search%");
            })
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                $query->orderBy($orderBy, $orderDirection);
            })
            ->whereNot('name', 'super-admin');

        return $perPage === 0 ? $result->get() : $result->paginate($perPage);
    }
}
