<?php

namespace App\Models\Dashboard\UserManagement\Roles;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Dashboard\UserManagement\Roles\Traits\RoleMethods;

/**
 *  Relations
 * @property BelongsToMany $permissions
 */
class Role extends SpatieRole
{
    /**
     * Application itself traits
     */
    use HasFactory, SoftDeletes;
    /**
     * My own traits
     */
    use RoleMethods;
}
