<?php

namespace App\Services\Dashboard\Information\Clients\Client\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Helpers\Classes\Uploads\Upload;
use App\Models\Dashboard\Information\Clients\Client;
use App\Contracts\Abstracts\Services\Create\CreateService;
use App\Services\Dashboard\Information\Clients\ClientRelatives\Create\ClientRelativeCreateService;

class ClientCreateService extends CreateService
{
    protected string $first_name;
    protected ?string $last_name;
    protected ?string $dob;
    protected mixed $photo;
    protected array $relatives;

    public function __construct(array $data)
    {
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->dob = $data['dob'];
        $this->photo = array_key_exists('photo', $data) ? $data['photo'] : null;
        $this->relatives = $data['relatives'];
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
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'dob' => $this->dob,
                    'photo' => $photo,
                ]);

                if (!empty($this->relatives)) {
                    $clientRelativeCreate = new ClientRelativeCreateService($client, $this->relatives);
                    $clientRelativeCreate->callMethod();
                }
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
