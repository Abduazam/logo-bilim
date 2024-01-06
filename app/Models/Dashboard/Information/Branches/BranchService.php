<?php

namespace App\Models\Dashboard\Information\Branches;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Dashboard\Information\Services\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Table columns
 * @property int $id
 * @property int $branch_id
 * @property int $service_id
 * @property int $price
 */
class BranchService extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int>
     */
    protected $fillable = [
        'branch_id',
        'service_id',
        'price',
    ];

    /**
     * Belongs to branch.
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Belongs to service.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Factory function: checks duplications before creating.
     */
    public function scopeRecycle($query, $branches, $services)
    {
        foreach ($branches as $branch) {
            foreach ($services as $service) {
                $query->firstOrCreate([
                    'branch_id' => $branch->id,
                    'service_id' => $service->id,
                ]);
            }
        }

        return $query;
    }
}
