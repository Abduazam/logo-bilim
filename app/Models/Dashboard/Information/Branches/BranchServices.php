<?php

namespace App\Models\Dashboard\Information\Branches;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Table columns
 * @property int $id
 * @property int $branch_id
 * @property int $service_id
 * @property float $price
 */
class BranchServices extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int>
     */
    protected $fillable = [
        'branch_id',
        'service_id',
        'price',
    ];
}
