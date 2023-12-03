<?php

namespace App\Repositories\Dashboard\UserManagement\Permissions;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Dashboard\UserManagement\Roles\Role;
use App\Models\Dashboard\UserManagement\Permissions\Permission;

class PermissionRepository
{
    public function getAll(): Collection
    {
        return Permission::with('translation')->get();
    }

    public function getNotChosenAll(Role $role)
    {
        return Permission::whereNotIn('id', $role->permissions->pluck('id'))->get();
    }

    public function getFiltered(
        string $search,
        int $perPage,
        string $orderBy,
        string $orderDirection,
    ) {
        $result = Permission::select(['id', 'name', 'created_at'])
            ->with('translation')
            ->withCount(['roles' => function ($query) {
                $query->where('name', '!=', 'super-admin');
            }])
            ->when($search, fn ($query, $search) => $query->where(function ($subQuery) use ($search) {
                $subQuery->where('name', 'like', "%$search%")
                    ->orWhereHas('translation', fn ($translationQuery) => $translationQuery->where('translation', 'like', "%$search%"));
            }))
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $result->get() : $result->paginate($perPage);
    }
}
