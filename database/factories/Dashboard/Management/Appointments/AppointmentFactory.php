<?php

namespace Database\Factories\Dashboard\Management\Appointments;

use App\Helpers\Services\Livewire\Hours\GenerateWorkHours;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dashboard\Management\Appointments\Appointment;

/**
 * @extends Factory<Appointment>
 */
class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $getHoursHelper = new GenerateWorkHours();
        $hours = $getHoursHelper->generate();

        $randomHourIndex = array_rand($hours);

        $user_id = $this->faker->numberBetween(3, 4);
        $branch_id = $user_id === 3 ? 3 : $this->faker->numberBetween(1, 2);

        $teacher_id = match ($branch_id) {
            3 => $this->faker->numberBetween(9, 10),
            2 => $this->faker->numberBetween(7, 8),
            1 => $this->faker->numberBetween(1, 6)
        };

        return [
            'user_id' => $user_id,
            'branch_id' => $branch_id,
            'teacher_id' => $teacher_id,
            'service_id' => 1,
            'service_price' => 50000,
            'start_time' => $hours[$randomHourIndex],
            'appointment_status_id' => 1,
            'created_date' => today()
        ];
    }
}
