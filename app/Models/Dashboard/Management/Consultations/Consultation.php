<?php

namespace App\Models\Dashboard\Management\Consultations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Models\Dashboard\Information\Clients\Client;
use App\Models\Dashboard\Information\Branches\Branch;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Dashboard\Information\Types\Payments\PaymentType;
use App\Contracts\Traits\Dashboard\Models\AppointmentStatusTrait;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;
use App\Models\Dashboard\Management\Consultations\Traits\ConsultationMethods;

/**
 * Table columns
 * @property int $id
 * @property int $user_id
 * @property int $branch_id
 * @property int $client_id
 * @property int $payment_amount
 * @property int $payment_type_id
 * @property string $start_time
 * @property string $end_time
 * @property string $created_date
 * @property int $appointment_status_id
 *
 * Relations
 * @property BelongsTo $user
 * @property BelongsTo $branch
 * @property BelongsTo $client
 * @property BelongsTo $paymentType
 * @property BelongsTo $paymentStatus
 * @property BelongsTo $appointmentStatus
 *
 * For reports
 * @property int $count
 * @property int $income
 * @property int $outcome
 * @property int $benefit
 */
class Consultation extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory, SoftDeletes;
    /**
     * My own traits
     */
    use ConsultationMethods, AppointmentStatusTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'branch_id',
        'client_id',
        'payment_amount',
        'payment_type_id',
        'start_time',
        'end_time',
        'created_date',
        'consultation_status_id',
    ];

    /**
     * Define consultation belong to user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define consultation belong to branch.
     *
     * @return BelongsTo
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Define consultation belong one client.
     *
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Define consultation belong to payment type.
     *
     * @return BelongsTo
     */
    public function paymentType(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class);
    }

    /**
     * Define consultation belongs to appointment status.
     *
     * @return BelongsTo
     */
    public function appointmentStatus(): BelongsTo
    {
        return $this->belongsTo(AppointmentStatus::class, 'consultation_status_id');
    }
}
