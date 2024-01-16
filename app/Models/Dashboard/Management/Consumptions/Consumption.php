<?php

namespace App\Models\Dashboard\Management\Consumptions;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Models\Dashboard\Information\Branches\Branch;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Table columns
 * @property int $id
 * @property int $user_id
 * @property int $branch_id
 * @property int $amount
 * @property string $comment
 *
 * Relations
 * @property BelongsTo $user
 * @property BelongsTo $branch
 */
class Consumption extends Model
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
        'user_id',
        'branch_id',
        'amount',
        'comment',
    ];

    /**
     * Define consumption belong to user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define consumption belong to branch.
     *
     * @return BelongsTo
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
