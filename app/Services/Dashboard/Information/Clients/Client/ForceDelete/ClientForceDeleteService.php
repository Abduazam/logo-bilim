<?php

namespace App\Services\Dashboard\Information\Clients\Client\ForceDelete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Clients\Client;
use App\Contracts\Abstracts\Services\ForceDelete\ForceDeleteService;

class ClientForceDeleteService extends ForceDeleteService
{
    public function __construct(protected Client $client) { }

    protected function forceDelete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->client->forceDelete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
