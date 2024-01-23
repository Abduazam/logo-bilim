<?php

namespace Database\Seeders\Dashboard\Information\Types\Payments;

use Illuminate\Database\Seeder;
use App\Models\Dashboard\Information\Types\Payments\PaymentType;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentTypes = ['Naqd', 'Karta', 'Qarz'];

        foreach ($paymentTypes as $paymentType) {
            PaymentType::create(['title' => $paymentType]);
        }
    }
}
