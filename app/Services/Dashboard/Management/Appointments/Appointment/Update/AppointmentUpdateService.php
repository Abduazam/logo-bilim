<?php

namespace App\Services\Dashboard\Management\Appointments\Appointment\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\DTO\Dashboard\Management\Appointments\AppointmentDTO;
use App\DTO\Dashboard\Management\Appointments\AppointmentClientDTO;
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
        $this->appointmentDTO = new AppointmentDTO($data['branch_id'], $data['teacher_id'], $data['service_id'], $data['service_price'], $data['start_time']);
        $this->appointmentClientDTO = new AppointmentClientDTO($data['clients'], $data['payments']);
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $newAppointmentArray = $this->appointmentDTO->getAsArray();
                $this->appointment->update($newAppointmentArray);

                $newAppointmentClients = [];

                $appointmentClients = $this->appointmentClientDTO->getAsArray();

                foreach ($appointmentClients as $appointmentClient) {
                    $newAppointmentClient = $appointmentClient;

                    if (is_array($appointmentClient['client_id'])) {
                        $clientCreateService = new ClientCreateService($appointmentClient['client_id']);
                        $response = $clientCreateService->callMethod();

                        if ($response) {
                            $clientRepository = new ClientRepository();
                            $client = $clientRepository->findByNameAndLastname($appointmentClient['client_id']['first_name'], $appointmentClient['client_id']['last_name']);
                            $newAppointmentClient['client_id'] = $client->id;
                        }
                    }

                    $newAppointmentClient['appointment_id'] = $this->appointment->id;
                    $newAppointmentClients[] = $newAppointmentClient;
                }

                $appointmentClientUpdateService = new AppointmentClientUpdateService($newAppointmentClients);
                $appointmentClientUpdateService->callMethod();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
