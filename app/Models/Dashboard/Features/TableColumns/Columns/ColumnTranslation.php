<?php

namespace App\Models\Dashboard\Features\TableColumns\Columns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Dashboard\Features\TableColumns\Columns\Traits\ColumnTranslationMethods;

/**
 * Table columns
 * @property int $id
 * @property int $column_id
 * @property string $slug
 * @property string $translation
 *
 * Relations
 * @property BelongsTo $column
 */
class ColumnTranslation extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory;
    /**
     * My own traits
     */
    use ColumnTranslationMethods;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'column_id',
        'slug',
        'translation',
    ];

    /**
     * Define translations belongs to column.
     *
     * @return BelongsTo
     */
    public function column(): BelongsTo
    {
        return $this->belongsTo(Column::class);
    }
}
