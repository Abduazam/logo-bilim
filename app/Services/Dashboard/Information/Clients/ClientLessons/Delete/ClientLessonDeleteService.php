<?php

namespace App\Services\Dashboard\Information\Clients\ClientLessons\Delete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Clients\Client;
use App\Contracts\Abstracts\Services\Delete\DeleteService;

class ClientLessonDeleteService extends DeleteService
{
    public function __construct(protected Client $client, protected array $lessonIds) { }

    protected function delete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                if (!empty($this->lessonIds)) {
                    $this->client->lessons()->whereNotIn('id', $this->lessonIds)->delete();
                }
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
