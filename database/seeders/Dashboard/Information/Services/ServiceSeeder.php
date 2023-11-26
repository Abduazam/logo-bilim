<?php

namespace Database\Seeders\Dashboard\Information\Services;

use Illuminate\Database\Seeder;
use App\Models\Dashboard\Information\Services\Service;
use App\Models\Dashboard\Information\Branches\BranchServices;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            'Logoped' => [
                1 => 130000,
                2 => 130000,
                3 => 150000,
            ],
            'Defektolog' => [
                1 => 110000,
                2 => 100000,
                3 => 120000,
            ],
            'Aba' => [
                1 => 100000,
                2 => 100000,
                3 => 100000,
            ],
        ];

        foreach ($services as $service => $values) {
            $newService = Service::create([
                'title' => $service,
            ]);

            foreach ($values as $branch => $price) {
                BranchServices::create([
                    'branch_id' => $branch,
                    'service_id' => $newService->id,
                    'price' => $price
                ]);
            }
        }
    }
}
