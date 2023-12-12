<?php

namespace App\Livewire\Management\Appointments\Components\Traits;

use Livewire\Attributes\Validate;
use Illuminate\Support\Collection;
use App\Models\Dashboard\Information\Clients\Client;
use App\Repositories\Dashboard\Information\Clients\ClientRepository;

trait ClientTrait
{
    public bool $clientSection = false;

    public string $search = '';
    public ?Collection $clients;

    #[Validate('nullable|numeric|exists:clients,id')]
    public ?int $client_id = null;

    #[Validate('required|string|min:3|max:75')]
    public ?string $first_name = null;

    #[Validate('required|string|min:3|max:75')]
    public ?string $last_name = null;

    #[Validate('required|date', as: 'date of birth')]
    public ?string $dob = null;

    #[Validate([
        'relatives' => 'nullable|array',
        'relatives.*' => 'array',
        'relatives.*.fullname' => 'required|string|min:3|max:100',
        'relatives.*.phone_number' => 'required|numeric|digits_between:9,15',
        'relatives.*.relative_status_id' => 'required|numeric|exists:relative_statuses,id',
    ], as: [
        'relatives.*.fullname' => 'fullname',
        'relatives.*.phone_number' => 'phone number',
        'relatives.*.relative_status_id' => 'relative',
    ])]
    public array $relatives = [];

    public function setClients(): void
    {
        $clientRepository = new ClientRepository();
        $this->clients = $clientRepository->getSearched($this->search);
    }

    public function setClient(Client $client): void
    {
        $this->client_id = $client->id;
        $this->first_name = $client->first_name;
        $this->last_name = $client->last_name;
        $this->dob = $client->dob;
        $this->clearSearch();
        $this->activateSectionClient();
    }

    public function unsetClient(): void
    {
        $this->client_id = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->dob = null;
        $this->activateSectionClient();
    }

    public function clearSearch(): void
    {
        $this->search = '';
        $this->clients = new Collection();
    }

    public function activateSectionClient(): void
    {
        if (!is_null($this->client_id)) {
            $this->clientSection = true;
        } else if (!is_null($this->first_name) and !is_null($this->last_name)) {
            $this->clientSection = true;
        } else if (!empty($this->relatives)) {
            if ($this->validate()) {
                $this->clientSection = true;
            } else {
                $this->clientSection = false;
            }
        } else {
            $this->clientSection = false;
        }
    }
}
