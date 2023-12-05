<?php

namespace App\Services\Dashboard\Information\PaymentTypes\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Create\CreateService;
use App\Models\Dashboard\Information\PaymentTypes\PaymentType;
use App\Models\Dashboard\Information\PaymentTypes\PaymentTypeTranslation;

class PaymentTypeCreateService extends CreateService
{
    protected array $translations;

    public function __construct(array $data)
    {
        $this->translations = $data['translations'];
    }

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $newPaymentType = PaymentType::create([
                    'key' => strtolower($this->translations['en'])
                ]);

                foreach ($this->translations as $key => $translation) {
                    PaymentTypeTranslation::create([
                        'payment_type_id' => $newPaymentType->id,
                        'slug' => $key,
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
