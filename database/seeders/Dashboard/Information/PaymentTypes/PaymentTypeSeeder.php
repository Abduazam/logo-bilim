<?php

namespace Database\Seeders\Dashboard\Information\PaymentTypes;

use Illuminate\Database\Seeder;
use App\Models\Dashboard\Information\PaymentTypes\PaymentType;
use App\Models\Dashboard\Information\PaymentTypes\PaymentTypeTranslation;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentTypes = [
            'cash' => [
                'slug' => 'en',
                'translation' => 'Cash',
            ],
            'card' => [
                'slug' => 'en',
                'translation' => 'Card',
            ],
            'debt' => [
                'slug' => 'en',
                'translation' => 'Debt',
            ],
        ];

        foreach ($paymentTypes as $key => $paymentType) {
            $newPaymentType = PaymentType::create(['key' => $key]);

            $paymentType['payment_type_id'] = $newPaymentType->id;
            PaymentTypeTranslation::create($paymentType);
        }
    }
}
