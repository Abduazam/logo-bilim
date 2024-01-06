<?php

namespace Database\Factories\Dashboard\Information\Branches;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Models\Dashboard\Information\Services\Service;
use App\Models\Dashboard\Information\Branches\BranchService;

/**
 * @extends Factory<BranchService>
 */
class BranchServiceFactory extends Factory
{
    protected $model = BranchService::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id' => Branch::factory(),
            'service_id' => Service::factory(),
            'price' => $this->faker->numberBetween(70, 150) * 1000,
        ];
    }
}
