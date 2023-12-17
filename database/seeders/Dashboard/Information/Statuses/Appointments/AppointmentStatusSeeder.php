<?php

namespace Database\Seeders\Dashboard\Information\Statuses\Appointments;

use Illuminate\Database\Seeder;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatusTranslation;

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
            'started' => [
                'slug' => 'en',
                'translation' => 'Started',
            ],
            'canceled' => [
                'slug' => 'en',
                'translation' => 'Canceled',
            ]
        ];

        foreach ($appointmentStatuses as $key => $appointmentStatus) {
            $newAppointmentStatus = AppointmentStatus::create(['key' => $key]);

            $appointmentStatus['appointment_status_id'] = $newAppointmentStatus->id;
            AppointmentStatusTranslation::create($appointmentStatus);
        }
    }
}