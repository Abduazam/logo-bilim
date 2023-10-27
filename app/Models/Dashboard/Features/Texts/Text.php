<?php

namespace App\Models\Dashboard\Features\Texts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $key
 * @property string $icon
 */
class Text extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'icon',
    ];

    public function translation(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(TextTranslation::class)->where('slug', app()->getLocale());
    }

    public function translations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TextTranslation::class);
    }

    public function getKey(): string
    {
        return '<code>' . $this->key . '</code>';
    }
}
