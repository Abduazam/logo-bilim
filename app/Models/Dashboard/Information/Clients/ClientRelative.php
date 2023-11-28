<?php

namespace App\Models\Dashboard\Information\Clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
