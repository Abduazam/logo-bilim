<?php

namespace Database\Seeders\Dashboard\UserManagement\Permissions;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Models\Dashboard\UserManagement\Permissions\Permission;
use App\Models\Dashboard\UserManagement\Permissions\PermissionTranslation;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Role::findByName('super-admin');
        $admin = Role::findByName('admin');
        $manager = Role::findByName('manager');

        $routes = collect(Route::getRoutes());

        $routes->each(function ($route) use ($superAdmin, $admin, $manager) {
            $name = $route->getName();
            if ($name && Str::startsWith($name, 'dashboard.')) {
                $permission = Permission::create(['name' => $name]);

                $translation = implode(' ', explode('.', ucfirst($name)));

                PermissionTranslation::create([
                    'permission_id' => $permission->id,
                    'slug' => app()->getLocale(),
                    'translation' => $translation,
                ]);

                if (Str::startsWith($name, 'dashboard.management.') or in_array($name, ['dashboard.home', 'dashboard.settings', 'dashboard.change-language'])) {
                    $manager->givePermissionTo($permission);
                }

                $superAdmin->givePermissionTo($permission);
                $admin->givePermissionTo($permission);
            }
        });
    }
}
