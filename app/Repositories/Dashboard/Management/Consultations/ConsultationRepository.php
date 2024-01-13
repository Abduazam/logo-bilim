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

    public function getFiltered() {
        return Consultation::select('id', 'user_id', 'branch_id', 'client_id', 'payment_amount', 'payment_type_id', 'start_time', 'end_time', 'created_date', 'consultation_status_id')
            ->with('branch', 'client', 'paymentType')
            ->whereDate('created_date', now())
            ->orderByDesc('id')
            ->get();
    }
}
