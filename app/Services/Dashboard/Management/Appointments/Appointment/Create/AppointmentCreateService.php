<?php

namespace App\Services\Dashboard\Management\Appointments\Appointment\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Create\CreateService;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\DTO\Dashboard\Management\Appointments\AppointmentClientDTO;
use App\DTO\Dashboard\Management\Appointments\Create\AppointmentDTO;
use App\Repositories\Dashboard\Information\Clients\ClientRepository;
use App\Services\Dashboard\Information\Clients\Client\Create\ClientCreateService;
use App\Services\Dashboard\Management\Appointments\AppointmentClient\Create\AppointmentClientCreateService;

class AppointmentCreateService extends CreateService
{
    protected AppointmentDTO $appointmentDTO;
    protected AppointmentClientDTO $appointmentClientDTO;

    public function __construct(array $data)
    {
        $this->appointmentDTO = new AppointmentDTO($data['branch_id'], $data['service_id'], $data['teacher_id'], $data['service_price'], $data['dates']);
        $this->appointmentClientDTO = new AppointmentClientDTO($data['clients'], $data['payments']);
    }

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $appointments = $this->appointmentDTO->getAsArray();

                $clients = $this->appointmentClientDTO->getAsArray();

                foreach ($clients as &$client) {
                    if (is_array($client['client_id'])) {
                        $client['client_id']['branch_id'] = $appointments[0]['branch_id'];
                        $clientCreateService = new ClientCreateService($client['client_id']);
                        $response = $clientCreateService->callMethod();

                        if ($response) {
                            $clientRepository = new ClientRepository();
                            $mewClient = $clientRepository->findByNameAndLastname($client['client_id']['first_name'], $client['client_id']['last_name']);
                            $client['client_id'] = $mewClient->id;
                        }
                    }
                }

                foreach ($appointments as $appointment) {
                    $newAppointment = Appointment::create($appointment);

                    foreach ($clients as &$client) {
                        $client['appointment_id'] = $newAppointment->id;
                    }

                    $appointmentClientCreateService = new AppointmentClientCreateService($clients);
                    $appointmentClientCreateService->callMethod();
                }
            });

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
