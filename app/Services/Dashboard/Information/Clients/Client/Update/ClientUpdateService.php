<?php

namespace App\Services\Dashboard\Information\Clients\Client\Update;

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
    protected mixed $photo;
    protected array $relatives;

    public function __construct(array $data, Client $client)
    {
        $this->client = $client;
        $this->branch_id = $data['branch_id'];
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->dob = $data['dob'];
        $this->photo = $data['photo'];
        $this->relatives = $data['relatives'];
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
                ];

                $attributes['photo'] = $this->photo;
                if (!is_null($this->photo) && $this->client->photo != $this->photo) {
                    $upload = new Upload($this->photo, 'clients', $this->client, 'photo');
                    $attributes['photo'] = $upload->uploadMedia();
                }

                $this->client->update($attributes);

                $clientRelativeUpdate = new ClientRelativeUpdateService($this->client, $this->relatives);
                $clientRelativeUpdate->callMethod();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
