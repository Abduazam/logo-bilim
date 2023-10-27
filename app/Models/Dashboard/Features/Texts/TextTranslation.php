<?php

namespace App\Models\Dashboard\Features\Texts;

use App\Models\Dashboard\Features\Languages\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $text_id
 * @property string $slug
 * @property string $translation
 */
class TextTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'text_id',
        'slug',
        'translation',
    ];

    public function text(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Text::class);
    }

    public function getSlugLanguage(): string
    {
        return $this->belongsTo(Language::class, 'slug', 'slug')->pluck('title')[0];
    }
}
