<?php

namespace App\Livewire\Information\Clients;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Information\Clients\Client;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Clients\Client\Restore\ClientRestoreService;

class Restore extends Component
{
    use DispatchingTrait;

    public Client $client;

    /**
     * @throws Exception
     */
    public function restore(): void
    {
        $service = new ClientRestoreService($this->client);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-rotate-left text-primary', 'restored-successfully', "<b>Client restored:</b> {$this->client->first_name} {$this->client->last_name}");
        } else {
            throw $response;
        }
    }
    public function render(): View
    {
        return view('livewire.information.clients.restore');
    }
}
