<?php

namespace App\Repositories\Dashboard\UserManagement\Permissions;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Dashboard\UserManagement\Roles\Role;

class PermissionRepository
{
    public function getAll(): Collection
    {
        return Permission::all();
    }

    public function getNotBelongedToRole(Role $role)
    {
        return Permission::whereNotIn('id', $role->permissions->pluck('id'))->get();
    }

    public function getFiltered(
        string $search,
        int $perPage,
        string $orderBy,
        string $orderDirection,
    ) {
        $result = Permission::select(['id', 'name', 'translation', 'created_at'])
            ->withCount(['roles' => function ($query) {
                $query->where('name', '!=', 'super-admin');
            }])
            ->when($search, function ($query, $search) {
                $search = strtolower($search);

                $query->where(DB::raw('LOWER(name)'), 'like', "%$search%")
                    ->orWhere(DB::raw('LOWER(translation)'), 'like', "%$search%");
            })
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $result->get() : $result->paginate($perPage);
    }
}
