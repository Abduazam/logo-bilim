<?php

namespace App\Models\Dashboard\Information\Clients;

use App\Models\Dashboard\Information\Services\Service;
use App\Models\Dashboard\Information\Teachers\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Table columns
 * @property int $id
 * @property int $client_id
 * @property int $service_id
 * @property int $teacher_id
 * @property mixed $price
 * @property mixed $start_time
 *
 * Relations
 * @property BelongsTo $client
 * @property BelongsTo $service
 * @property BelongsTo $teacher
 */
class ClientLesson extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int>
     */
    protected $fillable = [
        'client_id',
        'service_id',
        'teacher_id',
        'price',
        'start_time',
    ];

    /**
     * Defines belongs to client.
     *
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Defines belongs to service.
     *
     * @return BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Defines belongs to teacher.
     *
     * @return BelongsTo
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
}
