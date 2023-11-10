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
        $admin = Role::findByName('admin');

        $routes = collect(Route::getRoutes());

        $routes->each(function ($route) use ($admin) {
            $name = $route->getName();
            if ($name && Str::startsWith($name, 'dashboard.')) {
                $permission = Permission::create(['name' => $name]);

                $translation = implode(' ', explode('.', ucfirst($name)));

                PermissionTranslation::create([
                    'permission_id' => $permission->id,
                    'slug' => app()->getLocale(),
                    'translation' => $translation,
                ]);

                $admin->givePermissionTo($permission);
            }
        });
    }
}
