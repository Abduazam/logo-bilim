<?php

namespace App\Repositories\Dashboard\Reports\DailyReports;

use App\Models\Dashboard\Management\Appointments\Appointment;

class DailyReportRepository
{

    public function getFiltered(
        mixed $begin_date
    )
    {
        return Appointment::selectRaw(
                'branch_id,
                count(appointments.id) as count,
                sum(appointments.service_price) as income,
                sum(appointment_clients.teacher_salary) as outcome,
                sum(appointment_clients.benefit) as benefit,
                sum(CASE WHEN appointment_clients.payment_type_id = 3 THEN 1 ELSE 0 END) as debts
            ')
            ->leftJoin('appointment_clients', function($join) {
                $join->on('appointments.id', '=', 'appointment_clients.appointment_id');
                    // ->where('appointment_clients.payment_type_id', '!=', 3);
            })
            ->whereDate('appointments.created_date', $begin_date)
            ->groupBy('appointments.branch_id')
            ->get();
    }
}
