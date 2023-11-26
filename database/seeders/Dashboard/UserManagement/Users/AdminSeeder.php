<?php

namespace Database\Seeders\Dashboard\UserManagement\Users;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\Dashboard\UserManagement\Users\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);

        $superAdminUser = User::create([
            'name' => 'Softify',
            'email' => 'softify@gmail.com',
            'password' => Hash::make('123'),
            'email_verified_at' => now(),
        ]);

        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123'),
            'email_verified_at' => now(),
        ]);

        $superAdminUser->assignRole($superAdmin);
        $adminUser->assignRole($admin);
    }
}
