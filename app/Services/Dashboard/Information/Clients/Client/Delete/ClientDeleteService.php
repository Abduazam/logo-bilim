<?php

namespace App\Services\Dashboard\Information\Clients\Client\Delete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Clients\Client;
use App\Contracts\Abstracts\Services\Delete\DeleteService;

class ClientDeleteService extends DeleteService
{
    public function __construct(protected Client $client) { }

    protected function delete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->client->delete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
