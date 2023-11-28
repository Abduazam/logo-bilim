<?php

namespace App\Services\Dashboard\Information\Clients\Client\Restore;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Clients\Client;
use App\Contracts\Abstracts\Services\Restore\RestoreService;

class ClientRestoreService extends RestoreService
{
    public function __construct(protected Client $client) { }

    protected function restore(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->client->restore();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
