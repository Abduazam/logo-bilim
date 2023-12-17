<?php

namespace App\Models\Dashboard\Management\Appointments;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Models\Dashboard\Information\Branches\Branch;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Dashboard\Information\Services\Service;
use App\Models\Dashboard\Information\Teachers\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Dashboard\Management\Appointments\Traits\AppointmentMethods;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;

/**
 * Table columns
 * @property int $id
 * @property int $number
 * @property int $user_id
 * @property int $branch_id
 * @property int $teacher_id
 * @property int $service_id
 * @property int $service_price
 * @property string $start_time
 * @property int $appointment_status_id
 * @property string $created_date
 *
 * Relations
 * @property BelongsTo $user
 * @property BelongsTo $branch
 * @property BelongsTo $service
 * @property BelongsTo $teacher
 * @property AppointmentStatus $appointmentStatus
 * @property HasMany $clients
 */
class Appointment extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory, SoftDeletes;
    /**
     * My own traits
     */
    use AppointmentMethods;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number',
        'user_id',
        'branch_id',
        'teacher_id',
        'service_id',
        'service_price',
        'start_time',
        'appointment_status_id',
        'created_date'
    ];

    /**
     * Define appointment belong to user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define appointment belong to branch.
     *
     * @return BelongsTo
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Define appointment belong to service.
     *
     * @return BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Define appointment belong to teacher.
     *
     * @return BelongsTo
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Define appointment belong to teacher.
     *
     * @return BelongsTo
     */
    public function appointmentStatus(): BelongsTo
    {
        return $this->belongsTo(AppointmentStatus::class);
    }

    /**
     * Define appointment has many or one client/s.
     *
     * @return HasMany
     */
    public function clients(): HasMany
    {
        return $this->hasMany(AppointmentClients::class);
    }
}
