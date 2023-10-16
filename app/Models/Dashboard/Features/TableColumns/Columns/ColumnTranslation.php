<?php

namespace App\Models\Dashboard\Features\TableColumns\Columns;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $column_id
 * @property string $slug
 * @property string $translation
 */
class ColumnTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'column_id',
        'slug',
        'translation',
    ];

    public function column(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Column::class);
    }
}
