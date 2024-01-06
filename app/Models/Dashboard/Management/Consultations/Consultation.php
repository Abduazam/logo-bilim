<?php

namespace App\Models\Dashboard\Management\Consultations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Table columns
 * @property int $id
 * @property int $number
 * @property int $user_id
 * @property int $branch_id
 * @property int $service_price
 * @property string $start_time
 * @property int $appointment_status_id
 * @property string $created_date
 *
 * Relations
 *
 * For reports
 * @property int $count
 * @property int $income
 * @property int $outcome
 * @property int $benefit
 */
class Consultation extends Model
{
    use HasFactory, SoftDeletes;
}
