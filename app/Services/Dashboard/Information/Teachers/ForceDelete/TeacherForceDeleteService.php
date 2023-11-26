<?php

namespace App\Services\Dashboard\Information\Teachers\ForceDelete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Teachers\Teacher;
use App\Contracts\Abstracts\Services\ForceDelete\ForceDeleteService;

class TeacherForceDeleteService extends ForceDeleteService
{
    public function __construct(protected Teacher $teacher) { }

    protected function forceDelete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->teacher->forceDelete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
