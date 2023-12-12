<?php

namespace Database\Factories\Dashboard\Information\Clients;

use App\Models\Dashboard\Information\Clients\ClientRelative;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ClientRelative>
 */
class ClientRelativeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $phoneNumbers = ['998901111111', '998912222222', '998993333333', '998924444444', '998935555555', '998946666666'];
        $randomIndex = array_rand($phoneNumbers);

        return [
            'client_id' => $this->faker->numberBetween(1, 5),
            'fullname' => $this->faker->name,
            'phone_number' => $phoneNumbers[$randomIndex],
            'relative_status_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
