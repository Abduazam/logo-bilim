<?php

namespace App\Services\Dashboard\Information\Types\Payments\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Models\Dashboard\Information\Types\Payments\PaymentType;

class PaymentTypeUpdateService extends UpdateService
{
    protected PaymentType $paymentType;
    protected array $translations;

    public function __construct(array $data, PaymentType $paymentType)
    {
        $this->paymentType = $paymentType;
        $this->translations = $data['translations'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                foreach ($this->translations as $key => $translation) {
                    $this->paymentType->translations->where('slug', $key)->first()->update([
                        'translation' => $translation,
                    ]);
                }
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
