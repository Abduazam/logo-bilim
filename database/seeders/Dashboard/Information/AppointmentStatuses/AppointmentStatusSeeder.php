<?php

namespace Database\Seeders\Dashboard\Information\AppointmentStatuses;

use Illuminate\Database\Seeder;
use App\Models\Dashboard\Information\AppointmentStatuses\AppointmentStatus;
use App\Models\Dashboard\Information\AppointmentStatuses\AppointmentStatusTranslation;

class AppointmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appointmentStatuses = [
            'pending' => [
                'slug' => 'en',
                'translation' => 'Pending',
            ],
            'began' => [
                'slug' => 'en',
                'translation' => 'Began',
            ],
        ];

        foreach ($appointmentStatuses as $key => $appointmentStatus) {
            $newAppointmentStatus = AppointmentStatus::create(['key' => $key]);

            $appointmentStatus['appointment_status_id'] = $newAppointmentStatus->id;
            AppointmentStatusTranslation::create($appointmentStatus);
        }
    }
}
