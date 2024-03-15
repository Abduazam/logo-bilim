<?php

namespace App\Models\Dashboard\Management\Appointments;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Dashboard\Information\Clients\Client;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Dashboard\Information\Types\Payments\PaymentType;

/**
 * Table columns
 * @property int $id
 * @property int $appointment_id
 * @property int $client_id
 * @property int $payment_amount
 * @property int $payment_type_id
 * @property int $teacher_salary
 * @property int $benefit
 * @property int $status
 *
 * Relations
 * @property BelongsTo $appointment
 * @property BelongsTo $client
 * @property BelongsTo $paymentType
 */
class AppointmentClients extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'appointment_id',
        'client_id',
        'payment_amount',
        'payment_type_id',
        'teacher_salary',
        'benefit',
        'status'
    ];

    /**
     * Define appointment client belong to appointment.
     *
     * @return BelongsTo
     */
    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    /**
     * Define appointment client belong to client.
     *
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class)->withTrashed();
    }

    /**
     * Define appointment client belong to payment type.
     *
     * @return BelongsTo
     */
    public function paymentType(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class);
    }
}
