<?php

namespace App\Repositories\Dashboard\Reports\DailyReports;

use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Repositories\Dashboard\Information\Branches\BranchRepository;

class DailyReportRepository
{
    public function getAppointmentFiltered(?string $begin_date, ?string $end_date)
    {
        $branchIds = (new BranchRepository())->getByUser(auth()->user())->pluck('id')->toArray();

        return Appointment::select('branch_id')
            ->selectRaw('COUNT(id) as count')
            ->selectRaw('COALESCE(SUM(ac.income), 0) as income')
            ->selectRaw('COALESCE((SELECT SUM(amount) FROM consumptions WHERE branch_id = appointments.branch_id AND DATE(created_at) >= ? AND DATE(created_at) <= ?), 0) as consumption', [$begin_date, $end_date])
            ->selectRaw('COALESCE(SUM(ac.teacher_salary), 0) as teachers')
            ->selectRaw('COALESCE(SUM(ac.benefit), 0) as benefit')
            ->selectRaw('COALESCE(SUM(ac.cash), 0) as cash')
            ->selectRaw('COALESCE(SUM(ac.card), 0) as card')
            ->selectRaw('COALESCE(SUM(ac.debt), 0) as debt')
            ->leftJoin(DB::raw('(SELECT
                        appointment_id,
                        SUM(payment_amount) AS income,
                        SUM(teacher_salary) AS teacher_salary,
                        SUM(benefit) AS benefit,
                        COALESCE(SUM(CASE WHEN payment_type_id = 1 THEN payment_amount ELSE 0 END), 0) AS cash,
                        COALESCE(SUM(CASE WHEN payment_type_id = 2 THEN payment_amount ELSE 0 END), 0) AS card,
                        COALESCE(SUM(CASE WHEN payment_type_id = 3 THEN payment_amount ELSE 0 END), 0) AS debt
                    FROM appointment_clients
                    GROUP BY appointment_id) as ac'), 'appointments.id', '=', 'ac.appointment_id')
            ->when($begin_date, function ($query, $begin_date) use ($end_date) {
                if ($begin_date == date('Y-m-d') && is_null($end_date)) {
                    $query->whereDate('created_date', $begin_date);
                } else {
                    $query->whereDate('created_date', '>=', $begin_date);
                }
            })
            ->when($end_date, fn ($query) => $query->whereDate('created_date', '<=', $end_date))
            ->whereIn('branch_id', $branchIds)
            ->groupBy('branch_id')
            ->get();
    }
}
