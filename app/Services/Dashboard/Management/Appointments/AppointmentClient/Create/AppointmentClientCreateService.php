<?php

namespace App\Services\Dashboard\Management\Appointments\AppointmentClient\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Create\CreateService;
use App\Models\Dashboard\Management\Appointments\AppointmentClients;

class AppointmentClientCreateService extends CreateService
{
    protected array $appointmentClients;

    public function __construct(array $data)
    {
        $this->appointmentClients = $data;
    }

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                foreach ($this->appointmentClients as $appointmentClient) {
                    AppointmentClients::create($appointmentClient);
                }
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
