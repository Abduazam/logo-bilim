<?php

namespace App\Services\Dashboard\Management\Consumptions\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Models\Dashboard\Management\Consumptions\Consumption;
use App\DTO\Dashboard\Management\Consumptions\ConsumptionDTO;

class ConsumptionUpdateService extends UpdateService
{
    protected Consumption $consumption;
    protected ConsumptionDTO $consumptionDTO;

    public function __construct(array $data, Consumption $consumption)
    {
        $this->consumption = $consumption;
        $this->consumptionDTO = new ConsumptionDTO($data);
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $values = $this->consumptionDTO->getAsArray();

                $this->consumption->update($values);
            });

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
