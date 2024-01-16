<?php

namespace App\Services\Dashboard\Management\Consultations\Cancel;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Models\Dashboard\Management\Consultations\Consultation;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;

class ConsultationCancelService extends UpdateService
{
    protected Consultation $consultation;
    protected AppointmentStatus $appointmentStatus;

    public function __construct(Consultation $consultation)
    {
        $this->consultation = $consultation;
        $this->appointmentStatus = AppointmentStatus::where('key', 'canceled')->first();
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->consultation->update([
                    'consultation_status_id' => $this->appointmentStatus->id,
                ]);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
