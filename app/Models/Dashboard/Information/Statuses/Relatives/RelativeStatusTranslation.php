<?php

namespace App\Models\Dashboard\Information\Statuses\Relatives;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Table columns
 * @property int $id
 * @property int $relative_status_id
 * @property string $slug
 * @property string $translation
 *
 * Relations
 * @property BelongsTo $relativeStatus
 */
class RelativeStatusTranslation extends Model
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
        'relative_status_id',
        'slug',
        'translation',
    ];

    /**
     * Define translations belongs to column.
     *
     * @return BelongsTo
     */
    public function relativeStatus(): BelongsTo
    {
        return $this->belongsTo(RelativeStatus::class);
    }
}
