<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dashboard\Information\Clients\Client;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Models\Dashboard\Information\Services\Service;
use App\Models\Dashboard\Information\Teachers\Teacher;
use App\Models\Dashboard\Information\Clients\ClientRelative;
use App\Models\Dashboard\Information\Branches\BranchService;
use App\Models\Dashboard\Information\Teachers\TeacherService;

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

        /**
         * Create fake branches and services.
         */
        //$branches = Branch::factory(5)->create();

        //$services = Service::factory(3)->create();

        //BranchService::factory(15)->recycle($branches, $services)->create();

        /**
         * Create fake clients.
         */
        //$clients = Client::factory(10)->create();

        //ClientRelative::factory(20)->recycle($clients)->create();

        /**
         * Create fake teachers.
         */
        //$teachers = Teacher::factory(10)->create();

        //TeacherService::factory(25)->recycle($teachers, $branches, $services)->create();

        /**
         * Create fake appointments.
         */
        // AppointmentClientFactory::times(10)->create();
    }
}
