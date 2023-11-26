<?php

namespace App\Models\Dashboard\Information\Services;

use App\Models\Dashboard\Information\Teachers\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Dashboard\Information\Branches\Branch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Dashboard\Information\Services\Traits\ServiceMethods;

/**
 * Table columns
 * @property int $id
 * @property string $title
 *
 * Relations
 * @property BelongsToMany $branches
 */
class Service extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory, SoftDeletes;
    /**
     * My own traits
     */
    use ServiceMethods;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title'
    ];

    /**
     * Accesses service's all branches.
     *
     * @return BelongsToMany
     */
    public function branches(): BelongsToMany
    {
        return $this->belongsToMany(Branch::class, 'branch_services');
    }

    /**
     * Accesses service's all branches.
     *
     * @return BelongsToMany
     */
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'teacher_services')->withPivot('branch_id', 'salary');;
    }
}
