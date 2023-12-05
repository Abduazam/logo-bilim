<?php

namespace App\Models\Dashboard\Information\PaymentTypes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Table columns
 * @property int $id
 * @property int $payment_type_id
 * @property string $slug
 * @property string $translation
 *
 * Relations
 * @property BelongsTo $paymentType
 */
class PaymentTypeTranslation extends Model
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
        'payment_type_id',
        'slug',
        'translation',
    ];

    /**
     * Define translations belongs to column.
     *
     * @return BelongsTo
     */
    public function paymentType(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class);
    }
}
