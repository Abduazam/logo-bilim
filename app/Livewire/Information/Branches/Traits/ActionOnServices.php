<?php

namespace App\Livewire\Information\Branches\Traits;

use Livewire\Attributes\Validate;

trait ActionOnServices
{
    #[Validate('nullable|numeric|exists:services,id')]
    public ?int $service_id = null;
    public array $services = [];

    public function addService($id): void
    {
        $this->form->chosen_services[$id] = $this->services[$id];
        unset($this->services[$id]);
        $this->resetServiceId();
    }

    public function removeService($id): void
    {
        $this->services[$id] = $this->form->chosen_services[$id];
        unset($this->form->chosen_services[$id]);
        $this->resetServiceId();
    }

    private function resetServiceId(): void
    {
        $this->service_id = null;
    }
}
