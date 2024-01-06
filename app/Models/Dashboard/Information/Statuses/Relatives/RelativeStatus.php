<?php

namespace App\Models\Dashboard\Information\Statuses\Relatives;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Table columns
 * @property int $id
 * @property int $title
 */
class RelativeStatus extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<>
     */
    protected $fillable = [
        'title',
    ];
}
