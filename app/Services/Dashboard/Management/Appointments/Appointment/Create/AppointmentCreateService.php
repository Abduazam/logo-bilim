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
        $this->appointmentClientDTO = new AppointmentClientDTO($data['client_id'], $data['payment_amount'], $data['payment_type_id'], $data['teacher_salary'], $data['benefit'], $data['first_name'], $data['last_name'], $data['dob'], $data['relatives']);
    }

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $newAppointmentArray = $this->appointmentDTO->getAsArray();
                $appointment = Appointment::create($newAppointmentArray);

                $appointmentClient = $this->appointmentClientDTO->getAsArray();
                $appointmentClient['appointment_id'] = $appointment->id;

                if ($this->appointmentClientDTO->hasNewClient()) {
                    $newClientArray = $this->appointmentClientDTO->getNewClientAsArray();
                    $clientCreateService = new ClientCreateService($newClientArray);
                    $clientCreateService->callMethod();

                    $clientRepository = new ClientRepository();
                    $client = $clientRepository->findByNameAndLastname($newClientArray['first_name'], $newClientArray['last_name']);
                    $appointmentClient['client_id'] = $client->id;
                }

                $appointmentClientCreateService = new AppointmentClientCreateService($appointmentClient);
                $appointmentClientCreateService->callMethod();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
