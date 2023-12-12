<?php

namespace App\Services\Dashboard\Information\Statuses\Appointments\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;

class AppointmentStatusUpdateService extends UpdateService
{
    protected AppointmentStatus $appointmentStatus;
    protected array $translations;

    public function __construct(array $data, AppointmentStatus $appointmentStatus)
    {
        $this->appointmentStatus = $appointmentStatus;
        $this->translations = $data['translations'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                foreach ($this->translations as $key => $translation) {
                    $this->appointmentStatus->translations->where('slug', $key)->first()->update([
                        'translation' => $translation,
                    ]);
                }
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
