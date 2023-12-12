<?php

namespace Database\Seeders\Dashboard\Information\Types\Payments;

use Illuminate\Database\Seeder;
use App\Models\Dashboard\Information\Types\Payments\PaymentType;
use App\Models\Dashboard\Information\Types\Payments\PaymentTypeTranslation;

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
