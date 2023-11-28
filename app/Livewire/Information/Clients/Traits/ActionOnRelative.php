<?php

namespace App\Livewire\Information\Clients\Traits;

trait ActionOnRelative
{
    public function addRelative(): void
    {
        $this->form->relatives[] = $this->generateItem();
    }

    public function removeRelative(int $id): void
    {
        unset($this->form->relatives[$id]);
    }

    private function generateItem(): array
    {
        return [
            'fullname' => null,
            'phone_number' => null,
            'relative_status_id' => null,
        ];
    }
}
