<?php

namespace App\Repositories\Dashboard\Information\Types;

use App\Models\Dashboard\Information\Types\Payments\PaymentType;

class TypeRepository
{
    public function getPaymentTypesCount(): int
    {
        return PaymentType::query()->count();
    }
}
