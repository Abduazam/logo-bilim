<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            /**
             * Default data of user-management section.
             */
            Dashboard\UserManagement\Users\AdminSeeder::class,
            Dashboard\UserManagement\Permissions\PermissionsSeeder::class,
            /**
             * Default data of types and statuses.
             */
            Dashboard\Information\Types\Payments\PaymentTypeSeeder::class,
            Dashboard\Information\Statuses\Relatives\RelativeStatusSeeder::class,
            Dashboard\Information\Statuses\Appointments\AppointmentStatusSeeder::class,
        ]);
    }
}
