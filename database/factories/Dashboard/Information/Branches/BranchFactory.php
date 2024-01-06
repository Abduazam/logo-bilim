<?php

namespace Database\Factories\Dashboard\Information\Branches;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dashboard\Information\Branches\Branch;

/**
 * @extends Factory<Branch>
 */
class BranchFactory extends Factory
{
    protected $model = Branch::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->company,
        ];
    }
}
