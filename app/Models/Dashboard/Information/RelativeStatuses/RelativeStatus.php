<?php

namespace App\Models\Dashboard\Information\RelativeStatuses;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Table columns
 * @property int $id
 *
 * Relations
 * @property RelativeStatusTranslation $translation
 * @property HasMany $translations
 */
class RelativeStatus extends Model
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
    protected $fillable = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<RelativeStatusTranslation>
     */
    protected $with = ['translation'];

    /**
     * Accesses only one translation which slug equal to current locale.
     *
     * @return HasOne
     */
    public function translation(): HasOne
    {
        return $this->hasOne(RelativeStatusTranslation::class)->where('slug', app()->getLocale());
    }

    /**
     * Accesses all translations.
     *
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this->hasMany(RelativeStatusTranslation::class);
    }
}
