<?php

namespace App\Models\Dashboard\UserManagement\Permissions;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Relations
 * @property HasOne $translation
 * @property HasMany $translations
 */
class Permission extends SpatiePermission
{
    /**
     * Application itself traits
     */
    use HasFactory;

    /**
     * Accesses only one translation which slug equal to current locale.
     *
     * @return HasOne
     */
    public function translation(): HasOne
    {
        return $this->hasOne(PermissionTranslation::class)->where('slug', app()->getLocale());
    }

    /**
     * Accesses all translations.
     *
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this->hasMany(PermissionTranslation::class);
    }
}
