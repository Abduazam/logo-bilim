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
        $appointmentStatuses = ['Pending', 'Started', 'Canceled'];

        foreach ($appointmentStatuses as $appointmentStatus) {
            AppointmentStatus::create(['title' => $appointmentStatus]);
        }
    }
}
