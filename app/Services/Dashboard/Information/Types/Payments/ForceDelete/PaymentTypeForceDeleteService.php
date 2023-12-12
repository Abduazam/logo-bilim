<?php

namespace App\Services\Dashboard\Information\Types\Payments\ForceDelete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Types\Payments\PaymentType;
use App\Contracts\Abstracts\Services\ForceDelete\ForceDeleteService;

class PaymentTypeForceDeleteService extends ForceDeleteService
{
    public function __construct(protected PaymentType $paymentType) { }

    protected function forceDelete(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->paymentType->forceDelete();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
