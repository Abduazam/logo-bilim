<?php

namespace App\Traits\Models\Media;

use Illuminate\Support\Facades\File;

trait MediaTrait
{
    public function getThumbnail(?string $class = null): string
    {
        if (isset($this->thumbnail) and File::exists(public_path('storage/' . $this->thumbnail))) {
            $files = explode('.', $this->thumbnail);
            if (in_array(end($files), ['jpg', 'jpeg', 'png', 'svg'])) {
                return '<img src="/storage/' . $this->thumbnail . '" alt="' . $this->title . '" class="' .$class .'">';
            }
        }

        return '';
    }
}
