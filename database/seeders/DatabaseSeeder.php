<?php

namespace Database\Seeders;

use App\Models\Dashboard\Information\Branches\Branch;
use App\Models\Dashboard\Information\Branches\BranchService;
use App\Models\Dashboard\Information\Services\Service;
use App\Models\Dashboard\Information\Teachers\Teacher;
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
