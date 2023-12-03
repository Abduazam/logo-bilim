<?php

namespace App\Contracts\Traits\Dashboard\Models;

trait GetPictureTrait
{
    /**
     * Get photo and generate.
     *
     * @param string $alt
     * @param string $class
     * @return string
     */
    public function getPhoto(string $alt = 'name', string $class = 'w-25'): string
    {
        return !is_null($this->photo)
            ? '<img src="/storage/' . $this->photo . '" alt="' . $this->{$alt} . '" class="' . $class .'">'
            : '';
    }
}
