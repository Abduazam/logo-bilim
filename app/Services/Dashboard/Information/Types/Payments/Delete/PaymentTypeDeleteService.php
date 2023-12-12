<?php

namespace App\Services\Dashboard\Information\Types\Payments\Delete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Delete\DeleteService;
use App\Models\Dashboard\Information\Types\Payments\PaymentType;

class PaymentTypeDeleteService extends DeleteService
{
    public function __construct(protected PaymentType $paymentType) { }

    protected function delete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->paymentType->delete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
