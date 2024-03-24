<?php

namespace App\Services\Dashboard\Information\Clients\Client\Update;

use App\Services\Dashboard\Information\Clients\ClientLessons\Update\ClientLessonUpdateService;
use App\Services\Dashboard\Information\Clients\ClientRelatives\Update\ClientRelativeUpdateService;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Helpers\Classes\Uploads\Upload;
use App\Models\Dashboard\Information\Clients\Client;
use App\Contracts\Abstracts\Services\Update\UpdateService;

class ClientUpdateService extends UpdateService
{
    protected Client $client;
    protected ?int $branch_id;
    protected string $first_name;
    protected ?string $last_name;
    protected ?string $dob;
    protected ?string $diagnosis;
    protected ?string $agreement_date;
    protected mixed $photo;
    protected array $relatives;
    protected array $lessons;

    public function __construct(array $data, Client $client)
    {
        $this->client = $client;
        $this->branch_id = $data['branch_id'];
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->dob = $data['dob'];
        $this->diagnosis = $data['diagnosis'];
        $this->agreement_date = $data['agreement_date'];
        $this->photo = $data['photo'];
        $this->relatives = $data['relatives'];
        $this->lessons = $data['lessons'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $attributes = [
                    'branch_id' => $this->branch_id,
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'dob' => $this->dob,
                    'diagnosis' => $this->diagnosis,
                    'agreement_date' => $this->agreement_date,
                ];

                $attributes['photo'] = $this->photo;
                if (!is_null($this->photo) && $this->client->photo != $this->photo) {
                    $upload = new Upload($this->photo, 'clients', $this->client, 'photo');
                    $attributes['photo'] = $upload->uploadMedia();
                }

                $this->client->update($attributes);

                $clientRelativeUpdate = new ClientRelativeUpdateService($this->client, $this->relatives);
                $clientRelativeUpdate->callMethod();

                $clientLessonUpdate = new ClientLessonUpdateService($this->client, $this->lessons);
                $clientLessonUpdate->callMethod();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
