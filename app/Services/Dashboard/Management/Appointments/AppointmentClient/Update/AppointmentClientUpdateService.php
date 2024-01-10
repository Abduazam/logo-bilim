<?php

namespace App\Services\Dashboard\Management\Appointments\AppointmentClient\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Models\Dashboard\Management\Appointments\AppointmentClients;

class AppointmentClientUpdateService extends UpdateService
{
    protected array $appointmentClients;

    public function __construct(array $data)
    {
        $this->appointmentClients = $data;
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $appointmentId = $this->appointmentClients[0]['appointment_id'];

                $clientIds = collect($this->appointmentClients)->pluck('client_id')->toArray();

                AppointmentClients::where('appointment_id', $appointmentId)->whereNotIn('client_id', $clientIds)->forceDelete();

                foreach ($this->appointmentClients as $appointmentClient) {
                    AppointmentClients::updateOrCreate(
                        [
                            'appointment_id' => $appointmentClient['appointment_id'],
                            'client_id' => $appointmentClient['client_id'],
                        ],
                        $appointmentClient,
                    );
                }
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
