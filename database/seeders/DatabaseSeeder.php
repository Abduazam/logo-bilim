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
            /* DATA */
            Dashboard\UserManagement\Users\AdminSeeder::class,
            Dashboard\UserManagement\Permissions\PermissionsSeeder::class,
            Dashboard\Features\Languages\LanguageSeeder::class,

            /* TABLE COLUMNS */
            Dashboard\Features\TableColumns\TableColumnSeeder::class,
        ]);
    }
}
