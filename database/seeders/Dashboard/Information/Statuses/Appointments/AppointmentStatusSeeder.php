<?php

namespace Database\Seeders\Dashboard\Information\Statuses\Appointments;

use Illuminate\Database\Seeder;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;

class AppointmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appointmentStatuses = [
            'pending' => 'Kutilmoqda',
            'started' => 'Boshlangan',
            'canceled' => 'Bekor qilingan'
        ];

        foreach ($appointmentStatuses as $key => $appointmentStatus) {
            AppointmentStatus::create([
                'key' => strtolower($key),
                'title' => $appointmentStatus,
            ]);
        }
    }
}
