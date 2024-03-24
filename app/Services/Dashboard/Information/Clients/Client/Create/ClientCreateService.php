<?php

namespace App\Services\Dashboard\Information\Clients\Client\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Helpers\Classes\Uploads\Upload;
use App\Models\Dashboard\Information\Clients\Client;
use App\Contracts\Abstracts\Services\Create\CreateService;
use App\Services\Dashboard\Information\Clients\ClientLessons\Create\ClientLessonCreateService;
use App\Services\Dashboard\Information\Clients\ClientRelatives\Create\ClientRelativeCreateService;

class ClientCreateService extends CreateService
{
    protected ?int $branch_id;
    protected string $first_name;
    protected string $last_name;
    protected ?string $dob;
    protected ?string $diagnosis;
    protected ?string $agreement_date;
    protected mixed $photo;
    protected array $relatives;
    protected array $lessons;

    public function __construct(array $data)
    {
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

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $photo = null;
                if (!is_null($this->photo)) {
                    $upload = new Upload($this->photo, 'clients');
                    $photo = $upload->uploadMedia();
                }

                $client = Client::create([
                    'branch_id' => $this->branch_id,
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'dob' => $this->dob,
                    'diagnosis' => $this->diagnosis,
                    'agreement_date' => $this->agreement_date,
                    'photo' => $photo,
                ]);

                if (!empty($this->relatives)) {
                    $clientRelativeCreate = new ClientRelativeCreateService($client, $this->relatives);
                    $clientRelativeCreate->callMethod();
                }

                if (!empty($this->lessons)) {
                    $clientLessonCreate = new ClientLessonCreateService($client, $this->lessons);
                    $clientLessonCreate->callMethod();
                }
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
