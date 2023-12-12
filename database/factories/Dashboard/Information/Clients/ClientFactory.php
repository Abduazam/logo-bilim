<?php

namespace Database\Factories\Dashboard\Information\Clients;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dashboard\Information\Clients\Client;

/**
 * @extends Factory<Client>
 */
class ClientFactory extends Factory
{
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = '2010-01-01';
        $endDate = '2021-01-01';

        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'dob' => $this->faker->dateTimeBetween($startDate, $endDate)->format('Y-m-d'),
        ];
    }
}
