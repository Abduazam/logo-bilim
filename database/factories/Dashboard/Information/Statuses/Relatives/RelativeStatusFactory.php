<?php

namespace Database\Factories\Dashboard\Information\Statuses\Relatives;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;

/**
 * @extends Factory<RelativeStatus>
 */
class RelativeStatusFactory extends Factory
{
    protected $model = RelativeStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->colorName,
        ];
    }
}
