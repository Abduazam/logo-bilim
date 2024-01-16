<?php

namespace App\Services\Dashboard\Management\Consumptions\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Create\CreateService;
use App\Models\Dashboard\Management\Consumptions\Consumption;
use App\DTO\Dashboard\Management\Consumptions\ConsumptionDTO;

class ConsumptionCreateService extends CreateService
{
    protected ConsumptionDTO $consumptionDTO;

    public function __construct(array $data)
    {
        $this->consumptionDTO = new ConsumptionDTO($data);
    }

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $values = $this->consumptionDTO->getAsArray();

                Consumption::create($values);
            });

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
