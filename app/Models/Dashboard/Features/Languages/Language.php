<?php

namespace App\Models\Dashboard\Features\Languages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Dashboard\Features\Languages\Traits\LanguageMethods;

/**
 * Table columns
 * @property int $id
 * @property string $slug
 * @property string $title
 */
class Language extends Model
{
    /**
     * Application itself traits
     */
    use HasFactory, SoftDeletes;
    /**
     * My own traits
     */
    use LanguageMethods;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'slug',
        'title'
    ];
}
