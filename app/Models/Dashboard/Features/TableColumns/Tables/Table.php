<?php

namespace App\Models\Dashboard\Features\TableColumns\Tables;

use App\Models\Dashboard\Features\TableColumns\Columns\Column;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 */
class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $with = [
        'columns',
    ];

    public function columns(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Column::class)->orderBy('id');
    }

    public function relations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TableRelation::class, 'table_id');
    }
}
