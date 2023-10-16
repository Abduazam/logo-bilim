<?php

namespace App\Models\Dashboard\Features\TableColumns\Tables;

use App\Models\Dashboard\Features\TableColumns\Columns\Column;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $relation_id
 * @property int $column_id
 * @property string $method
 */
class TableRelation extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_id',
        'relation_id',
        'column_id',
        'method'
    ];

    public function table(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Table::class, 'table_id');
    }

    public function relation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Table::class, 'relation_id');
    }

    public function column(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Column::class);
    }
}
