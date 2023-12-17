<?php

namespace Database\Factories\Dashboard\Management\Appointments;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Models\Dashboard\Management\Appointments\AppointmentClients;

/**
 * @extends Factory<AppointmentClients>
 */
class AppointmentClientFactory extends Factory
{
    protected $model = AppointmentClients::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $appointment = Appointment::factory()->create();

        $teacher_salary = $appointment->service_price - 40000;
        $benefit = $appointment->service_price - $teacher_salary;

        return [
            'appointment_id' => $appointment->id,
            'client_id' => $this->faker->numberBetween(1, 5),
            'payment_amount' => $appointment->service_price,
            'payment_type_id' => $this->faker->numberBetween(1, 3),
            'teacher_salary' => $teacher_salary,
            'benefit' => $benefit,
        ];
    }
}
