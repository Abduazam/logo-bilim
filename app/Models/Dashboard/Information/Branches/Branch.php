<?php

namespace App\Models\Dashboard\Information\Branches;

use App\Models\Dashboard\Information\Services\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Dashboard\UserManagement\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Table columns
 * @property int $id
 * @property string $title
 *
 * Relations
 * @property BelongsToMany $users
 * @property BelongsToMany $services
 */
class Branch extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title'
    ];

    /**
     * Accesses branch's all users.
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_branches');
    }

    /**
     * Accesses user's all branches.
     *
     * @return BelongsToMany
     */
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'branch_services');
    }
}
