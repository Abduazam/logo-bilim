<?php

namespace App\Services\Dashboard\Information\PaymentTypes\ForceDelete;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\PaymentTypes\PaymentType;
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
