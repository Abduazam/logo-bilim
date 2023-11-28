<?php

namespace App\Services\Dashboard\Information\Clients\ClientRelatives\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Clients\Client;
use App\Contracts\Abstracts\Services\Create\CreateService;
use App\Models\Dashboard\Information\Clients\ClientRelative;

class ClientRelativeCreateService extends CreateService
{
    public function __construct(protected Client $client, protected array $relatives) { }

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                foreach ($this->relatives as $relative) {
                    $relative['client_id'] = $this->client->id;

                    ClientRelative::create($relative);
                }
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
