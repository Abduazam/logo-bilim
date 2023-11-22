<?php

namespace App\Models\Dashboard\Information\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Dashboard\Information\Branches\Branch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title'
    ];

    /**
     * Accesses user's all branches.
     *
     * @return BelongsToMany
     */
    public function branches(): BelongsToMany
    {
        return $this->belongsToMany(Branch::class, 'branch_services');
    }
}
