<?php

namespace Database\Factories\Dashboard\Information\Teachers;

use App\Models\Dashboard\Information\Branches\Branch;
use App\Models\Dashboard\Information\Services\Service;
use App\Models\Dashboard\Information\Teachers\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dashboard\Information\Teachers\TeacherService;

/**
 * @extends Factory<TeacherService>
 */
class TeacherServiceFactory extends Factory
{
    protected $model = TeacherService::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teacher_id' => Teacher::factory(),
            'branch_id' => Branch::factory(),
            'service_id' => Service::factory(),
            'salary' => $this->faker->numberBetween(50, 100) * 1000,
        ];
    }
}
