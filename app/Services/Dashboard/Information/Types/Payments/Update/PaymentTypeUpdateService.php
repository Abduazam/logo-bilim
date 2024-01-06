<?php

namespace App\Services\Dashboard\Information\Types\Payments\Update;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Models\Dashboard\Information\Types\Payments\PaymentType;

class PaymentTypeUpdateService extends UpdateService
{
    protected PaymentType $paymentType;
    protected string $title;

    public function __construct(array $data, PaymentType $paymentType)
    {
        $this->paymentType = $paymentType;
        $this->title = $data['title'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $title = Str::title($this->title);

                $this->paymentType->update([
                    'title' => $title,
                ]);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
