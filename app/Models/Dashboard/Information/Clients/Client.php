<?php

namespace App\Models\Dashboard\Information\Clients;

use App\Models\Dashboard\Information\Branches\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Contracts\Traits\Dashboard\Models\GetPictureTrait;
use App\Models\Dashboard\Management\Appointments\Appointment;

/**
 * Table columns
 * @property int $id
 * @property int $branch_id
 * @property string $first_name
 * @property string $last_name
 * @property mixed $dob
 * @property string $diagnosis
 * @property mixed $agreement_date
 * @property mixed $photo
 *
 * Relations
 * @property BelongsTo $branch
 * @property HasMany $relatives
 * @property HasMany $appointments
 * @property HasMany $lessons
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
        'branch_id',
        'first_name',
        'last_name',
        'dob',
        'diagnosis',
        'agreement_date',
        'photo',
    ];

    /**
     * Defines belongs to branch.
     *
     * @return BelongsTo
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Defines has many relatives.
     *
     * @return HasMany
     */
    public function relatives(): HasMany
    {
        return $this->hasMany(ClientRelative::class);
    }

    /**
     * Defines has many data in appointments.
     *
     * @return HasMany
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Defines has many data in lessons.
     *
     * @return HasMany
     */
    public function lessons(): HasMany
    {
        return $this->hasMany(ClientLesson::class);
    }
}
