<?php

namespace App\Services\Dashboard\Management\Consultations\ForceDelete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Management\Consultations\Consultation;
use App\Contracts\Abstracts\Services\ForceDelete\ForceDeleteService;

class ConsultationForceDeleteService extends ForceDeleteService
{
    public function __construct(protected Consultation $consultation) { }

    protected function forceDelete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->consultation->forceDelete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
