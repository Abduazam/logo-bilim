<?php

namespace App\Repositories\Dashboard\Reports\DailyReports;

use App\Models\Dashboard\Management\Appointments\Appointment;

class DailyReportRepository
{

    public function getFiltered(
        mixed $begin_date
    )
    {
        $result = Appointment::selectRaw('branch_id, COUNT(appointments.id) as appointment_count, SUM(appointment_clients.benefit) as total_benefit')
            ->leftJoin('appointment_clients', function($join) {
                $join->on('appointments.id', '=', 'appointment_clients.appointment_id')
                    ->where('appointment_clients.payment_type_id', '!=', 3);
            })
            ->whereDate('appointments.created_date', $begin_date)
            ->groupBy('appointments.branch_id')
            ->get();

        return $result;
    }
}
