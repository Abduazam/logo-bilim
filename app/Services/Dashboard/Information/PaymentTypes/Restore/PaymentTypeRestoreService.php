<?php

namespace App\Services\Dashboard\Information\PaymentTypes\Restore;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Restore\RestoreService;
use App\Models\Dashboard\Information\PaymentTypes\PaymentType;

class PaymentTypeRestoreService extends RestoreService
{
    public function __construct(protected PaymentType $paymentType) { }

    protected function restore(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->paymentType->restore();
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
