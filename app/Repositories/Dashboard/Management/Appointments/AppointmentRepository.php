<?php

namespace App\Repositories\Dashboard\Management\Appointments;

use App\Models\Dashboard\Information\Branches\Branch;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Dashboard\Management\Appointments\Appointment;

class AppointmentRepository
{
    public function getAll(): Collection
    {
        return Appointment::all();
    }

    public function getTotalInToday()
    {
        return Appointment::whereDate('created_date', now())->count();
    }

    public function getTotalCreatedInToday()
    {
        return Appointment::whereDate('created_at', now())->count();
    }

    public function getBusyHours(int $branch_id, int $service_id, ?int $teacher_id, mixed $created_date = null): array
    {
        !is_null($created_date) ? $now = $created_date : $now = now();

        return Appointment::where('branch_id', $branch_id)
            ->where('service_id', $service_id)
            ->whereDate('created_date', $now)
            ->when($teacher_id, function ($query, $teacher_id) {
                return $query->where('teacher_id', $teacher_id);
            })->pluck('start_time')->map(function ($time) {
                return Carbon::parse($time)->format('H:s');
            })->toArray();
    }

    public function getFiltered(
        int $branch_id,
        int $teacher_id,
        int $service_id,
        mixed $hour,
        int $appointment_status_id,
        int $perPage,
    ) {
        $user = auth()->user();

        $branchIds = $user->branches->pluck('id')->toArray();

        if ($user->hasRole('admin')) {
            $branchIds = Branch::pluck('id')->toArray();
        }

        $result = Appointment::select('id', 'number', 'user_id', 'branch_id', 'teacher_id', 'service_id', 'service_price', 'start_time', 'appointment_status_id', 'created_date')
            ->with('service', 'teacher', 'clients')
            ->when($branch_id, function ($query, $branch_id) {
                return $query->where('branch_id', $branch_id);
            })
            ->when($teacher_id, function ($query, $teacher_id) {
                return $query->where('teacher_id', $teacher_id);
            })
            ->when($service_id, function ($query, $service_id) {
                return $query->where('service_id', $service_id);
            })
            ->when($hour, function ($query, $hour) {
                return $query->where('start_time', $hour);
            })
            ->when($appointment_status_id, function ($query, $appointment_status_id) {
                return $query->where('appointment_status_id', $appointment_status_id);
            })
            ->whereIn('branch_id', $branchIds)
            ->whereDate('created_date', now())
            ->orderByDesc('id');

        return $perPage === 0 ? $result->get() : $result->paginate($perPage);
    }
}
