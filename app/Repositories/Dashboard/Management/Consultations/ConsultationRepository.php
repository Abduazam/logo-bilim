<?php

namespace App\Repositories\Dashboard\Management\Consultations;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Dashboard\Management\Consultations\Consultation;

class ConsultationRepository
{
    public function getAll(): Collection
    {
        return Consultation::all();
    }

    public function getBusyHours(string $createdDate)
    {
        return Consultation::whereDate('created_date', $createdDate)->pluck('start_time')->toArray();
    }

    public function getFiltered(int $payment_type_id, int $consultation_status_id)
    {
        return Consultation::select('id', 'user_id', 'branch_id', 'client_id', 'payment_amount', 'payment_type_id', 'start_time', 'end_time', 'created_date', 'consultation_status_id')
            ->with('branch', 'client', 'paymentType')
            ->whereDate('created_date', now())
            ->when($payment_type_id, fn ($query) => $query->where('payment_type_id', $payment_type_id))
            ->when($consultation_status_id, fn ($query) => $query->where('consultation_status_id', $consultation_status_id))
            ->orderByDesc('id')
            ->get();
    }
}
