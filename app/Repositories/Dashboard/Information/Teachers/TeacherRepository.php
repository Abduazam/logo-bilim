<?php

namespace App\Repositories\Dashboard\Information\Teachers;

use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Teachers\Teacher;

class TeacherRepository
{
    public function getFiltered(
        string $search,
        int $perPage,
        bool $with_trashed,
        string $orderBy,
        string $orderDirection,
    ) {
        $query = Teacher::select(['id', 'fullname', 'dob', 'phone_number', 'photo', 'created_at', 'deleted_at'])
            ->withCount(['branches' => function ($query) {
                $query->select(DB::raw('count(distinct branch_id)'));
            }, 'services'])
            ->when($with_trashed, function ($query) {
                return $query->onlyTrashed();
            })
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('fullname', 'like', "%$search%");
                });
            })
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                return $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $query->get() : $query->paginate($perPage);
    }
}
