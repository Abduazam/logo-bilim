<?php

namespace Database\Seeders\Dashboard\UserManagement\Users;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Models\Dashboard\UserManagement\Roles\Role;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $managerRole = Role::findByName('manager');

        $password = Hash::make('123');
        $managers = [
            [
                'user' => [
                    'name' => 'Abduazam',
                    'email' => 'abduazam@gmail.com',
                    'password' => $password,
                    'email_verified_at' => now(),
                ],
                'branches' => [3]
            ],
            [
                'user' => [
                    'name' => 'Shodiyor',
                    'email' => 'shodiyor@gmail.com',
                    'password' => $password,
                    'email_verified_at' => now(),
                ],
                'branches' => [1, 2]
            ],
        ];

        foreach ($managers as $manager) {
            $newUser = User::create($manager['user']);
            $newUser->assignRole($managerRole);

            $newUser->branches()->sync($manager['branches']);
        }
    }
}
