<?php

namespace App\Services\Dashboard\Information\Teachers\Delete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Teachers\Teacher;
use App\Contracts\Abstracts\Services\Delete\DeleteService;

class TeacherDeleteService extends DeleteService
{
    public function __construct(protected Teacher $teacher) { }

    protected function delete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->teacher->delete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
