<?php

namespace App\Repositories\Dashboard\Information\Teachers;

use App\Models\Dashboard\Information\Branches\Branch;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Teachers\Teacher;

class TeacherRepository
{
    public function getOne(int $teacher_id)
    {
        return Teacher::findOrFail($teacher_id);
    }

    public function getByBranchService(int $branch_id, int $service_id)
    {
        return Teacher::whereHas('myServices', function ($query) use ($branch_id, $service_id) {
            $query->where('branch_id', $branch_id)
                ->where('service_id', $service_id);
        })->get();
    }

    public function getFreeTeachers(int $branch_id, int $service_id, string $start_time)
    {
        return Teacher::whereHas('myServices', function ($query) use ($branch_id, $service_id) {
            $query->where('branch_id', $branch_id)
                ->where('service_id', $service_id);
            })
            ->whereDoesntHave('appointments', function ($query) use ($branch_id, $service_id, $start_time) {
                $query->where('branch_id', $branch_id)
                    ->where('service_id', $service_id)
                    ->where('start_time', $start_time)
                    ->whereDate('created_date', today());
            })->get();
    }

    public function getByBranch()
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            $branchIds = Branch::pluck('id')->toArray();
        } else {
            $branchIds = $user->branches->pluck('id')->toArray();
        }

        return Teacher::whereHas('branches', function ($query) use ($branchIds) {
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
        $result = Teacher::select(['id', 'fullname', 'dob', 'phone_number', 'photo', 'created_at', 'deleted_at'])
            ->withCount(['branches' => function ($query) {
                $query->select(DB::raw('count(distinct branch_id)'));
            }, 'services'])
            ->when($with_trashed, function ($query) {
                return $query->onlyTrashed();
            })
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $search = strtolower($search);

                    $query->where(DB::raw('LOWER(fullname)'), 'like', "%$search%");
                });
            })
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                return $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $result->get() : $result->paginate($perPage);
    }
}
