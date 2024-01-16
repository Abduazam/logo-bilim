<?php

namespace App\Services\Dashboard\Management\Consumptions\Delete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Delete\DeleteService;
use App\Models\Dashboard\Management\Consumptions\Consumption;

class ConsumptionDeleteService extends DeleteService
{
    public function __construct(protected Consumption $consumption) { }

    protected function delete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->consumption->delete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
