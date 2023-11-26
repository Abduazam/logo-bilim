<?php

namespace App\Models\Dashboard\Information\Teachers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Models\Dashboard\Information\Services\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Table columns
 * @property int $id
 * @property int $teacher_id
 * @property int $branch_id
 * @property int $service_id
 * @property float $salary
 *
 * Relations
 * @property BelongsTo $teacher
 * @property BelongsTo $branch
 * @property BelongsTo $service
 */
class TeacherService extends Model
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
        'teacher_id',
        'branch_id',
        'service_id',
        'salary',
    ];

    /**
     * Define service belongs to teacher.
     *
     * @return BelongsTo
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Define service belongs to branch.
     *
     * @return BelongsTo
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Define service belongs to service.
     *
     * @return BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
