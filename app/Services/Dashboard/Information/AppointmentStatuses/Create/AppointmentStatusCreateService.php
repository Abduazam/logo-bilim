<?php

namespace App\Services\Dashboard\Information\AppointmentStatuses\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Create\CreateService;
use App\Models\Dashboard\Information\AppointmentStatuses\AppointmentStatus;
use App\Models\Dashboard\Information\AppointmentStatuses\AppointmentStatusTranslation;

class AppointmentStatusCreateService extends CreateService
{
    protected array $translations;

    public function __construct(array $data)
    {
        $this->translations = $data['translations'];
    }

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $newAppointmentStatus = AppointmentStatus::create([
                    'key' => strtolower($this->translations['en'])
                ]);

                foreach ($this->translations as $key => $translation) {
                    AppointmentStatusTranslation::create([
                        'appointment_status_id' => $newAppointmentStatus->id,
                        'slug' => $key,
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
