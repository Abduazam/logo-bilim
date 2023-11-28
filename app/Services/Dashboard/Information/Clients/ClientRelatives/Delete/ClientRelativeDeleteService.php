<?php

namespace App\Services\Dashboard\Information\Clients\ClientRelatives\Delete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Clients\Client;
use App\Contracts\Abstracts\Services\Delete\DeleteService;

class ClientRelativeDeleteService extends DeleteService
{
    public function __construct(protected Client $client, protected array $relativeIds) { }

    protected function delete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                if (!empty($this->relativeIds)) {
                    $this->client->relatives()->whereNotIn('id', $this->relativeIds)->delete();
                }
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
