<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
             * Default data of user-management section
             */
            Dashboard\UserManagement\Users\AdminSeeder::class,
            Dashboard\UserManagement\Permissions\PermissionsSeeder::class,

            /**
             * Default data of features section
             */
            Dashboard\Features\Languages\LanguageSeeder::class,
            Dashboard\Features\TableColumns\TableColumnSeeder::class,

            /**
             * Default data of information section
             */
            Dashboard\Information\Branches\BranchSeeder::class,
            Dashboard\Information\Services\ServiceSeeder::class,
        ]);
    }
}
