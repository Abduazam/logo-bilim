<?php

namespace App\Models\Dashboard\Features\TableColumns\Columns;

use App\Models\Dashboard\Features\TableColumns\Tables\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $table_id
 * @property string $name
 * @property string $method
 * @property bool $sortable
 * @property bool $visible
 */
class Column extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_id',
        'name',
        'method',
        'sortable',
        'visible',
    ];

    public function table(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Table::class);
    }

    public function translation(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ColumnTranslation::class)->where('slug', app()->getLocale());
    }

    public function translations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ColumnTranslation::class);
    }

    public function sortable(): bool
    {
        return $this->sortable;
    }

    public function getActive(): string
    {
        return match ($this->active) {
            1 => '<span>active</span>',
            default => '<span>inactive</span>',
        };
    }
}
