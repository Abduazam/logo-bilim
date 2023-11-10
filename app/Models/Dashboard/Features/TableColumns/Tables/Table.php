<?php

namespace App\Models\Dashboard\Features\TableColumns\Tables;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Dashboard\Features\TableColumns\Columns\Column;

/**
 * Table columns
 * @property int $id
 * @property string $name
 *
 * Relations
 * @property HasMany $columns
 */
class Table extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Accesses all columns.
     *
     * @return HasMany
     */
    public function columns(): HasMany
    {
        return $this->hasMany(Column::class)->orderBy('id');
    }
}
