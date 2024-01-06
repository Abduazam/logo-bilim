<?php

namespace Database\Factories\Dashboard\Information\Teachers;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dashboard\Information\Teachers\Teacher;

/**
 * @extends Factory<Teacher>
 */
class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => $this->faker->name('female') . ' ' . $this->faker->lastName('female'),
            'dob' => $this->faker->dateTimeBetween('-35 years'),
            'phone_number' => $this->faker->e164PhoneNumber,
        ];
    }
}
