<?php

namespace App\Services\Dashboard\Information\Clients\ClientLessons\Create;

use App\Models\Dashboard\Information\Clients\ClientLesson;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Clients\Client;
use App\Contracts\Abstracts\Services\Create\CreateService;

class ClientLessonCreateService extends CreateService
{
    public function __construct(protected Client $client, protected array $lessons) { }

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                foreach ($this->lessons as $lesson) {
                    $lesson['client_id'] = $this->client->id;

                    ClientLesson::create($lesson);
                }
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
