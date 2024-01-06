<?php

namespace App\Models\Dashboard\UserManagement\Permissions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission;

/**
 * Table columns
 * @property int $id
 * @property int $permission_id
 * @property string $translation
 *
 * Relations
 * @property BelongsTo $permission
 */
class PermissionTranslation extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'permission_id',
        'translation',
    ];

    /**
     * Define translations belongs to column.
     *
     * @return BelongsTo
     */
    public function permission(): BelongsTo
    {
        return $this->belongsTo(Permission::class);
    }
}
