<?php

namespace App\Services\Dashboard\Information\Clients\ClientRelatives\Update;

use App\Services\Dashboard\Information\Clients\ClientRelatives\Delete\ClientRelativeDeleteService;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Clients\Client;
use App\Contracts\Abstracts\Services\Update\UpdateService;

class ClientRelativeUpdateService extends UpdateService
{
    public function __construct(protected Client $client, protected array $relatives) { }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                if (empty($this->relatives)) {
                    $this->client->relatives()->delete();
                } else {
                    $relativeIds = [];

                    foreach ($this->relatives as $relative) {
                        if (array_key_exists('relative_id', $relative)) {
                            $relativeIds[] = $relative['relative_id'];

                            $cleanRelative = $relative;
                            unset($cleanRelative['relative_id']);

                            $clientRelative = $this->client->relatives()->find($relative['relative_id']);
                            if ($clientRelative) {
                                $clientRelative->update($cleanRelative);
                            }
                        } else {
                            $this->client->relatives()->create($relative);
                        }
                    }

                    $clientRelativeDelete = new ClientRelativeDeleteService($this->client, $relativeIds);
                    $clientRelativeDelete->callMethod();
                }
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
