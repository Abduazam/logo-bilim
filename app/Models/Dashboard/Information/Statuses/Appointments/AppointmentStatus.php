<?php

namespace App\Models\Dashboard\Information\Statuses\Appointments;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Table columns
 * @property int $id
 * @property string $key
 * @property string $title
 */
class AppointmentStatus extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<>
     */
    protected $fillable = [
        'key',
        'title',
    ];
}
