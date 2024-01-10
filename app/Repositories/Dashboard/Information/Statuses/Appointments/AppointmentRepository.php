<?php

namespace App\Repositories\Dashboard\Information\Statuses\Appointments;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;

class AppointmentRepository
{
    public function getAll(): Collection
    {
        return AppointmentStatus::all();
    }

    public function getFiltered(
        string $search,
        int $perPage,
        bool $with_trashed,
        string $orderBy,
        string $orderDirection,
    ) {
        $result = AppointmentStatus::select(['id', 'key', 'title', 'created_at', 'deleted_at'])
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
