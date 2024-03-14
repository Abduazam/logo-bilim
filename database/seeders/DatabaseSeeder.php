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

        /**
         * Create fake branches and services.
         */
        $branches = Branch::factory(3)->create();

        $services = Service::factory(3)->create();

        $services = $services->shuffle();

        foreach ($branches as $branch) {
            $assignedServices = $services->random(2);

            foreach ($assignedServices as $service) {
                BranchService::factory()->create([
                    'branch_id' => $branch->id,
                    'service_id' => $service->id,
                    'price' => rand(70, 150) * 1000,
                ]);
            }
        }

        /**
         * Create fake teachers.
         */
        $teachers = Teacher::factory(10)->create();

        $combinations = collect();

        foreach ($teachers as $teacher) {
            foreach ($branches as $branch) {
                foreach ($services as $service) {
                    $combinations->push([
                        'teacher_id' => $teacher->id,
                        'branch_id' => $branch->id,
                        'service_id' => $service->id,
                        'salary' => rand(50, 100) * 1000,
                    ]);
                }
            }
        }
    }
}
