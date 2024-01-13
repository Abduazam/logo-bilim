<?php

namespace Database\Factories\Dashboard\Management\Consultations;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dashboard\Information\Clients\Client;
use App\Helpers\Services\Livewire\Hours\GenerateWorkHours;
use App\Models\Dashboard\Management\Consultations\Consultation;

/**
 * @extends Factory<Consultation>
 */
class ConsultationFactory extends Factory
{
    protected $model = Consultation::class;

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

        $branch_id = $this->faker->numberBetween(1, 3);

        $start_time = Carbon::createFromFormat('H:i', $hours[$randomHourIndex]);
        $end_time = $start_time->copy()->addHours(rand(1, 2));

        return [
            'user_id' => 2,
            'branch_id' => $branch_id,
            'client_id' => Client::factory(),
            'payment_amount' => $this->faker->numberBetween(100, 500) * 1000,
            'payment_type_id' => $this->faker->numberBetween(1, 3),
            'start_time' => $start_time,
            'end_time' => $end_time,
            'created_date' => today(),
            'consultation_status_id' => 1,
        ];
    }
}
