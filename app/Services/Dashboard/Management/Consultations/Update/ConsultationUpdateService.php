<?php

namespace App\Services\Dashboard\Management\Consultations\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Create\CreateService;
use App\Models\Dashboard\Management\Consultations\Consultation;
use App\DTO\Dashboard\Management\Consultations\ConsultationDTO;
use App\Repositories\Dashboard\Information\Clients\ClientRepository;
use App\Services\Dashboard\Information\Clients\Client\Create\ClientCreateService;

class ConsultationUpdateService extends CreateService
{
    protected Consultation $consultation;
    protected ConsultationDTO $consultationDTO;
    protected array $clientInfo;

    public function __construct(array $data, Consultation $consultation)
    {
        $this->consultation = $consultation;
        $this->consultationDTO = new ConsultationDTO($data['payments'], $data['created_date'], $data['start_time'], $data['end_time']);
        $this->clientInfo = $data['clients'];
    }

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $values = $this->consultationDTO->getAsArray();

                if (is_null($this->clientInfo['client_id'])) {
                    $clientCreateService = new ClientCreateService($this->clientInfo['info']);
                    $response = $clientCreateService->callMethod();

                    if ($response) {
                        $clientRepository = new ClientRepository();
                        $client = $clientRepository->findByNameAndLastname($this->clientInfo['info']['first_name'], $this->clientInfo['info']['last_name']);
                        $values['client_id'] = $client->id;
                    }
                } else {
                    $values['client_id'] = $this->clientInfo['client_id'];
                }

                $this->consultation->update($values);
            });

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
