<?php

namespace App\Livewire\Information\Clients\Traits;

trait ActionOnRelative
{
    public function addRelative(): void
    {
        $this->form->relatives[] = $this->generateRelative();
    }

    public function removeRelative(int $id): void
    {
        unset($this->form->relatives[$id]);
    }

    private function generateRelative(): array
    {
        return [
            'fullname' => null,
            'phone_number' => null,
            'relative_status_id' => null,
        ];
    }
}
