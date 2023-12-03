<?php

namespace App\Models\Dashboard\Information\Clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Contracts\Traits\Dashboard\Models\GetPictureTrait;

/**
 * Table columns
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property mixed $dob
 * @property mixed $photo
 *
 * Relations
 * @property HasMany $relatives
 */
class Client extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory, SoftDeletes;
    /**
     * My own traits
     */
    use GetPictureTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'photo',
    ];

    /**
     * Defines has many relatives.
     *
     * @return HasMany
     */
    public function relatives(): HasMany
    {
        return $this->hasMany(ClientRelative::class);
    }
}
