<?php

namespace App\Models\Dashboard\Features\TableColumns\Columns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Dashboard\Features\TableColumns\Tables\Table;

/**
 * Table columns
 * @property int $id
 * @property int $table_id
 * @property string $name
 * @property bool $sortable
 * @property bool $visible
 *
 * Relations
 * @property BelongsTo $table
 * @property HasOne $translation
 * @property HasMany $translations
 */
class Column extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string, bool>
     */
    protected $fillable = [
        'table_id',
        'name',
        'sortable',
        'visible',
    ];

    /**
     * Define translations belongs to table.
     *
     * @return BelongsTo
     */
    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }

    /**
     * Accesses only one translation which slug equal to current locale.
     *
     * @return HasOne
     */
    public function translation(): HasOne
    {
        return $this->hasOne(ColumnTranslation::class)->where('slug', app()->getLocale());
    }

    /**
     * Accesses all translations.
     *
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this->hasMany(ColumnTranslation::class);
    }
}
