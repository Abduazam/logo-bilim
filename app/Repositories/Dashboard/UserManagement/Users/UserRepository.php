<?php

namespace App\Repositories\Dashboard\UserManagement\Users;

use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\UserManagement\Users\User;

class UserRepository
{
    public function getFiltered(
        string $search,
        int $perPage,
        bool $with_trashed,
        string $orderBy,
        string $orderDirection,
        int $role_id,
    ) {
        $result = User::select(['id', 'photo', 'name', 'email', 'created_at', 'deleted_at'])
            ->with('roles:id,name')
            ->when($with_trashed, function ($query) {
                return $query->onlyTrashed();
            })
            ->when($role_id, function ($query, $role_id) {
                return $query->whereHas('roles', fn ($query) => $query->where('id', $role_id));
            })
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $search = strtolower($search);

                    $query->where(DB::raw('LOWER(name)'), 'like', "%$search%")
                        ->orWhere(DB::raw('LOWER(email)'), 'like', "%$search%");
                });
            })
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                return $query->orderBy($orderBy, $orderDirection);
            })
            ->whereNot('id', 1);

        return $perPage === 0 ? $result->get() : $result->paginate($perPage);
    }
}
