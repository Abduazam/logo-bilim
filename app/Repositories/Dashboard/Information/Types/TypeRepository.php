<?php

namespace App\Repositories\Dashboard\Information\Types;

use App\Models\Dashboard\Information\PaymentTypes\PaymentType;

class TypeRepository
{
    public function getPaymentTypesCount(): int
    {
        return PaymentType::query()->count();
    }
}
