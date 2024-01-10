<?php

namespace App\Services\Dashboard\Management\Appointments\Appointment\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\DTO\Dashboard\Management\Appointments\AppointmentClientDTO;
use App\DTO\Dashboard\Management\Appointments\Update\AppointmentDTO;
use App\Repositories\Dashboard\Information\Clients\ClientRepository;
use App\Services\Dashboard\Information\Clients\Client\Create\ClientCreateService;
use App\Services\Dashboard\Management\Appointments\AppointmentClient\Update\AppointmentClientUpdateService;

class AppointmentUpdateService extends UpdateService
{
    protected Appointment $appointment;
    protected AppointmentDTO $appointmentDTO;
    protected AppointmentClientDTO $appointmentClientDTO;

    public function __construct(array $data, Appointment $appointment)
    {
        $this->appointment = $appointment;
        $this->appointmentDTO = new AppointmentDTO($data['branch_id'], $data['teacher_id'], $data['service_id'], $data['service_price'], $data['start_time'], $data['created_date']);
        $this->appointmentClientDTO = new AppointmentClientDTO($data['clients'], $data['payments']);
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $values = $this->appointmentDTO->getAsArray();

                $this->appointment->update($values);

                $clients = $this->appointmentClientDTO->getAsArray();

                foreach ($clients as &$client) {
                    if (is_array($client['client_id'])) {
                        $clientCreateService = new ClientCreateService($client['client_id']);
                        $response = $clientCreateService->callMethod();

                        if ($response) {
                            $clientRepository = new ClientRepository();
                            $mewClient = $clientRepository->findByNameAndLastname($client['client_id']['first_name'], $client['client_id']['last_name']);
                            $client['client_id'] = $mewClient->id;
                        }
                    }

                    $client['appointment_id'] = $this->appointment->id;
                }

                $appointmentClientUpdateService = new AppointmentClientUpdateService($clients);
                $appointmentClientUpdateService->callMethod();
            });

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
