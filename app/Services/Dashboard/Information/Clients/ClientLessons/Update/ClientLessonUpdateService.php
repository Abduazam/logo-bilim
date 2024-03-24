<?php

namespace App\Services\Dashboard\Information\Clients\ClientLessons\Update;

use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Models\Dashboard\Information\Clients\Client;
use App\Services\Dashboard\Information\Clients\ClientLessons\Delete\ClientLessonDeleteService;
use App\Services\Dashboard\Information\Clients\ClientRelatives\Delete\ClientRelativeDeleteService;
use Exception;
use Illuminate\Support\Facades\DB;

class ClientLessonUpdateService extends UpdateService
{
    public function __construct(protected Client $client, protected array $lessons) { }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                if (empty($this->lessons)) {
                    $this->client->lessons()->delete();
                } else {
                    $lessonIds = [];

                    foreach ($this->lessons as $lesson) {
                        if (array_key_exists('lesson_id', $lesson)) {
                            $lessonIds[] = $lesson['lesson_id'];

                            $cleanLesson = $lesson;
                            unset($cleanLesson['lesson_id']);

                            $clientLesson = $this->client->lessons()->find($lesson['lesson_id']);
                            if ($clientLesson) {
                                $clientLesson->update($cleanLesson);
                            }
                        } else {
                            $newLesson = $this->client->lessons()->create($lesson);
                            $lessonIds[] = $newLesson->id;
                        }
                    }

                    $clientRelativeDelete = new ClientLessonDeleteService($this->client, $lessonIds);
                    $clientRelativeDelete->callMethod();
                }
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
