<?php

namespace App\Models\Dashboard\UserManagement\Users;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Dashboard\UserManagement\Users\Traits\UserMethods;

/**
 * Table columns
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $photo
 *
 * Relations
 * @property BelongsTo $role
 * @property BelongsToMany $roles
 * @property BelongsToMany $permissions
 */
class User extends Authenticatable implements MustVerifyEmail
{
    /**
     * Application itself traits
     */
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;
    /**
     * My own traits
     */
    use UserMethods;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}