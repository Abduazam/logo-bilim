<?php

namespace App\Services\Dashboard\Management\Appointments\AppointmentClient\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Create\CreateService;
use App\Models\Dashboard\Management\Appointments\AppointmentClients;

class AppointmentClientCreateService extends CreateService
{
    protected array $appointmentClient;

    public function __construct(array $data)
    {
        $this->appointmentClient = $data;
    }

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                AppointmentClients::create($this->appointmentClient);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
