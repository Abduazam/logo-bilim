<?php

namespace App\Models\Dashboard\UserManagement\Users;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Table columns
 * @property int $id
 * @property int $user_id
 * @property int $branch_id
 */
class UserBranches extends Model
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
        'user_id',
        'branch_id',
    ];
}
