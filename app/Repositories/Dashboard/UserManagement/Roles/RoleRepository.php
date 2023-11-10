<?php

namespace App\Repositories\Dashboard\UserManagement\Roles;

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
        $users = Role::select(['id', 'name', 'created_at', 'deleted_at'])
            ->withCount('permissions', 'users')
            ->when($with_trashed, fn ($query) => $query->onlyTrashed())
            ->when($search, fn ($query, $search) => $query->where('name', 'like', '%' . $search . '%'))
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $users->get() : $users->paginate($perPage);
    }
}
