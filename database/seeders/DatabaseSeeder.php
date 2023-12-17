<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\Dashboard\Information\Clients\ClientFactory;
use Database\Factories\Dashboard\Information\Clients\ClientRelativeFactory;
use Database\Factories\Dashboard\Management\Appointments\AppointmentClientFactory;

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
             * Default data of features section.
             */
            Dashboard\Features\Languages\LanguageSeeder::class,
            Dashboard\Features\TableColumns\TableColumnSeeder::class,

            /**
             * Default data of information section.
             */
            Dashboard\Information\Branches\BranchSeeder::class,
            Dashboard\Information\Services\ServiceSeeder::class,
            Dashboard\Information\Statuses\Relatives\RelativeStatusSeeder::class,
            Dashboard\Information\Types\Payments\PaymentTypeSeeder::class,
            Dashboard\Information\Statuses\Appointments\AppointmentStatusSeeder::class,
            Dashboard\Information\Teachers\TeacherSeeder::class,

            /**
             * Default data of managers.
             */
            Dashboard\UserManagement\Users\ManagerSeeder::class,
        ]);

        /**
         * Create fake clients.
         */
        ClientFactory::times(5)->create();
        ClientRelativeFactory::times(5)->create();

        /**
         * Create fake appointments.
         */
        AppointmentClientFactory::times(10)->create();
    }
}
