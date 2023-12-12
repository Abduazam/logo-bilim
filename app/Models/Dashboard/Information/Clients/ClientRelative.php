<?php

namespace App\Models\Dashboard\Information\Clients;

use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Table columns
 * @property int $id
 * @property int $client_id
 * @property string $fullname
 * @property string $phone_number
 * @property string $relative_status_id
 *
 * Relations
 * @property BelongsTo $client
 * @property BelongsTo $relativeStatus
 */
class ClientRelative extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'client_id',
        'fullname',
        'phone_number',
        'relative_status_id',
    ];

    /**
     * Belongs to client.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Has relative status.
     */
    public function relativeStatus(): BelongsTo
    {
        return $this->belongsTo(RelativeStatus::class, 'relative_status_id');
    }
}
