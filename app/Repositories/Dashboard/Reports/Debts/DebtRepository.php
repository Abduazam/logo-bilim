<?php

namespace App\Repositories\Dashboard\Reports\Debts;

use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Models\Dashboard\Management\Consultations\Consultation;

class DebtRepository
{
    public function getAppointmentFiltered(?string $begin_date, ?string $end_date, ?int $teacher_id)
    {
        return Appointment::with('teacher', 'clients')
            ->whereHas('clients', function ($query) {
                $query->where('payment_type_id', 3);
            })
            ->when($teacher_id, fn ($query) => $query->where('teacher_id', $teacher_id))
            ->when($begin_date, function ($query, $begin_date) use ($end_date) {
                if ($begin_date == date('Y-m-d') && is_null($end_date)) {
                    $query->whereDate('created_date', $begin_date);
                } else {
                    $query->whereDate('created_date', '>=', $begin_date);
                }
            })
            ->when($end_date, fn ($query) => $query->whereDate('created_date', '<=', $end_date))
            ->get(['id', 'teacher_id', 'created_date'])
            ->each(function ($appointment) {
                $appointment->total_payment = $appointment->clients->sum('payment_amount');
            });
    }


    public function getConsultationFiltered(?string $begin_date, ?string $end_date)
    {
        return Consultation::with('client')
            ->where('payment_type_id', 3)
            ->when($begin_date, function ($query, $begin_date) use ($end_date) {
                if ($begin_date == date('Y-m-d') && is_null($end_date)) {
                    $query->whereDate('created_at', $begin_date);
                } else {
                    $query->whereDate('created_at', '>=', $begin_date);
                }
            })
            ->when($end_date, fn ($query) => $query->whereDate('created_at', '<=', $end_date))
            ->get();
    }
}
