<?php

namespace Database\Factories\Dashboard\Information\Services;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dashboard\Information\Services\Service;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle,
        ];
    }
}
