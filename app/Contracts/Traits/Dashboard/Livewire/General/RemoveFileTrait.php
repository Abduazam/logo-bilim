<?php

namespace App\Contracts\Traits\Dashboard\Livewire\General;

trait RemoveFileTrait
{
    public function removePhoto($field): void
    {
        $this->form->reset($field);
    }
}
