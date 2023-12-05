<?php

namespace App\Models\Dashboard\Information\AppointmentStatuses;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Table columns
 * @property int $id
 * @property int $appointment_status_id
 * @property string $slug
 * @property string $translation
 *
 * Relations
 * @property BelongsTo $appointmentStatus
 */
class AppointmentStatusTranslation extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'appointment_status_id',
        'slug',
        'translation',
    ];

    /**
     * Define translations belongs to column.
     *
     * @return BelongsTo
     */
    public function appointmentStatus(): BelongsTo
    {
        return $this->belongsTo(AppointmentStatus::class);
    }
}
