<?php

namespace App\Contracts\Traits\Dashboard\Livewire\General;

trait DispatchingTrait
{
    public function dispatchSuccess($icon, $action, $description): void
    {
        $this->dispatch('dispatch-toast', [
            'icon' => $icon,
            'title' => $action,
            'description' => $description
        ]);
    }

    public function dispatchMany(array $dispatches): void
    {
        foreach ($dispatches as $dispatch) {
            $this->dispatch($dispatch);
        }
    }
}