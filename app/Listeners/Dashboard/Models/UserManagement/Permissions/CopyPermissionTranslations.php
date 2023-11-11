<?php

namespace App\Listeners\Dashboard\Models\UserManagement\Permissions;

use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Dashboard\Models\Features\Languages\LanguageCreated;
use App\Models\Dashboard\UserManagement\Permissions\PermissionTranslation;

class CopyPermissionTranslations implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LanguageCreated $event): void
    {
        $permissions = PermissionTranslation::select('permission_id')->distinct()->get();

        DB::transaction(function () use ($event, $permissions) {
            $newRecords = [];

            $timestamp = now();

            foreach ($permissions as $permission) {
                $newRecords[] = [
                    'permission_id' => $permission->permission_id,
                    'slug' => $event->language->slug,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ];
            }

            PermissionTranslation::insert($newRecords);
        });
    }
}
