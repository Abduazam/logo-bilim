<?php

namespace App\Services\Dashboard\Information\Teachers\Restore;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Teachers\Teacher;
use App\Contracts\Abstracts\Services\Restore\RestoreService;

class TeacherRestoreService extends RestoreService
{
    public function __construct(protected Teacher $teacher) { }

    protected function restore(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->teacher->restore();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
