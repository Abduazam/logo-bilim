<?php

namespace App\Models\Dashboard\Information\Branches;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Table columns
 * @property int $id
 * @property string $title
 */
class Branch extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title'
    ];
}
