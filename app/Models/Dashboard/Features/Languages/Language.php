<?php

namespace App\Models\Dashboard\Features\Languages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $slug
 * @property string $title
 */
class Language extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'title'
    ];

    public function isLast(): bool
    {
        $languages = Language::whereNot('id', $this->id)->get();
        if (count($languages) > 0) {
            return false;
        }

        return true;
    }
}
