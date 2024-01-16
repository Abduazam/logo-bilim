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
use App\Models\Dashboard\Management\Consultations\Consultation;

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

        $combinations = $combinations->shuffle();

        $combinations->take(25)->each(function ($combination) {
            TeacherService::factory()->create($combination);
        });

        /**
         * Create fake clients.
         */
        $clients = Client::factory(10)->create();

        ClientRelative::factory(20)->recycle($clients)->create();

        /**
         * Create fake consultations.
         */
        Consultation::factory(8)->recycle($clients)->create();
    }
}
