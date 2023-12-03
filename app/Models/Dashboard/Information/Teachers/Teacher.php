<?php

namespace App\Models\Dashboard\Information\Teachers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Models\Dashboard\Information\Services\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Contracts\Traits\Dashboard\Models\GetPictureTrait;

/**
 * Table columns
 * @property int $id
 * @property string $fullname
 * @property mixed $dob
 * @property string $phone_number
 * @property mixed $photo
 *
 * Relations
 * @property BelongsToMany $services
 * @property BelongsToMany $branches
 * @property HasMany $myServices
 */
class Teacher extends Model
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
        'fullname',
        'dob',
        'phone_number',
        'photo',
    ];

    /**
     * Accesses teacher's all services.
     *
     * @return BelongsToMany
     */
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'teacher_services')->withPivot('branch_id', 'salary');
    }

    /**
     * Accesses teacher's all branches.
     *
     * @return BelongsToMany
     */
    public function branches(): BelongsToMany
    {
        return $this->belongsToMany(Branch::class, 'teacher_services');
    }

    /**
     * Defines has many data in teacher_services.
     *
     * @return HasMany
     */
    public function myServices(): HasMany
    {
        return $this->hasMany(TeacherService::class);
    }
}
