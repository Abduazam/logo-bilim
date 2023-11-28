<?php

namespace App\Livewire\Information\Clients;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Information\Clients\Client;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Clients\Client\Delete\ClientDeleteService;

class Delete extends Component
{
    use DispatchingTrait;

    public Client $client;

    /**
     * @throws Exception
     */
    public function delete(): void
    {
        $service = new ClientDeleteService($this->client);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-trash text-danger', 'deleted-successfully', "<b>Client deleted:</b> {$this->client->first_name} {$this->client->last_name}");
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.information.clients.delete');
    }
}
