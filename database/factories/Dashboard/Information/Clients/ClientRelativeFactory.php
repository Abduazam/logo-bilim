<?php

namespace Database\Factories\Dashboard\Information\Clients;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dashboard\Information\Clients\Client;
use App\Models\Dashboard\Information\Clients\ClientRelative;

/**
 * @extends Factory<ClientRelative>
 */
class ClientRelativeFactory extends Factory
{
    protected $model = ClientRelative::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'fullname' => $this->faker->name,
            'phone_number' => $this->faker->e164PhoneNumber,
            'relative_status_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
