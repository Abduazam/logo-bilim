<?php

namespace App\Services\Dashboard\Management\Appointments\Appointment\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Create\CreateService;
use App\DTO\Dashboard\Management\Appointments\AppointmentDTO;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\DTO\Dashboard\Management\Appointments\AppointmentClientDTO;
use App\Repositories\Dashboard\Information\Clients\ClientRepository;
use App\Services\Dashboard\Information\Clients\Client\Create\ClientCreateService;
use App\Services\Dashboard\Management\Appointments\AppointmentClient\Create\AppointmentClientCreateService;

class AppointmentCreateService extends CreateService
{
    protected AppointmentDTO $appointmentDTO;
    protected AppointmentClientDTO $appointmentClientDTO;

    public function __construct(array $data)
    {
        $this->appointmentDTO = new AppointmentDTO($data['branch_id'], $data['teacher_id'], $data['service_id'], $data['service_price'], $data['start_time']);
        $this->appointmentClientDTO = new AppointmentClientDTO($data['clients'], $data['payments']);
    }

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $newAppointmentArray = $this->appointmentDTO->getAsArray();
                $appointment = Appointment::create($newAppointmentArray);

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

                    $newAppointmentClient['appointment_id'] = $appointment->id;
                    $newAppointmentClients[] = $newAppointmentClient;
                }

                $appointmentClientCreateService = new AppointmentClientCreateService($newAppointmentClients);
                $appointmentClientCreateService->callMethod();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}