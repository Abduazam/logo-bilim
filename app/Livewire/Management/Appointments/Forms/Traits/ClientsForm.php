<?php

namespace App\Livewire\Management\Appointments\Forms\Traits;

use Livewire\Attributes\Validate;
use Illuminate\Support\Collection;
use App\Models\Dashboard\Information\Clients\Client;
use App\Repositories\Dashboard\Information\Clients\ClientRepository;

trait ClientsForm
{
    public bool $clientsForm = false;

    public string $search = '';
    public ?Collection $searchedClients;

    #[Validate([
        'clients' => 'required|array',
        'clients.*' => 'required|array',
        'clients.*.client_id' => 'nullable|numeric|exists:clients,id',
        'clients.*.info' => 'required|array',
        'clients.*.info.first_name' => 'required|string|min:3|max:75',
        'clients.*.info.last_name' => 'required|string|min:3|max:75',
        'clients.*.info.dob' => 'nullable|date',
        'clients.*.info.relatives' => 'nullable|array',
        'clients.*.info.relatives.*' => 'nullable|array',
        'clients.*.info.relatives.*.fullname' => 'required|string|min:3|max:100',
        'clients.*.info.relatives.*.phone_number' => 'required|numeric|digits_between:9,15',
        'clients.*.info.relatives.*.relative_status_id' => 'required|numeric|exists:relative_statuses,id',
    ], as: [
        'clients.*.info.first_name' => 'first name',
        'clients.*.info.last_name' => 'last name',
        'clients.*.info.dob' => 'date of birth',
        'clients.*.info.relatives.*.fullname' => 'fullname',
        'clients.*.info.relatives.*.phone_number' => 'phone number',
        'clients.*.info.relatives.*.relative_status_id' => 'status',
    ])]
    public array $clients = [];

    private array $client = [
        'client_id' => null,
        'info' => [
            'first_name' => null,
            'last_name' => null,
            'dob' => null,
            'relatives' => [],
        ],
    ];

    private array $relative = [
        'fullname' => null,
        'phone_number' => null,
        'relative_status_id' => null,
    ];

    public function setSearchedClients(): void
    {
        $clientRepository = new ClientRepository();
        $this->searchedClients = $clientRepository->getSearched($this->search);
    }

    public function clearSearch(): void
    {
        $this->search = '';
        $this->searchedClients = new Collection();
    }

    public function addClient(): void
    {
        $this->clients[] = $this->client;
        $this->addPayment();
        $this->checkClientsFormTrue();
    }

    public function removeClient(int $index): void
    {
        unset($this->clients[$index]);
        $this->removePayment($index);
    }

    public function setClientInfo(Client $client): void
    {
        $index = array_search($this->client, $this->clients, true);

        if (is_numeric($index)) {
            $this->clients[$index]['client_id'] = $client->id;
            $this->clients[$index]['info'] = [
                'first_name' => $client->first_name,
                'last_name' => $client->last_name,
                'dob' => $client->dob,
            ];
        }

        $this->clearSearch();
        $this->checkClientsFormTrue();
        $this->setClientName($index);
    }

    public function clearClientInfo(int $index): void
    {
        $this->clients[$index] = $this->client;
        $this->checkClientsFormTrue();
    }

    public function addRelative(int $index): void
    {
        $this->clients[$index]['info']['relatives'][] = $this->relative;
        $this->checkClientsFormTrue();
    }

    public function removeRelative(int $clientIndex, int $relativeIndex): void
    {
        unset($this->clients[$clientIndex]['info']['relatives'][$relativeIndex]);
    }

    public function checkClientsFormTrue(): void
    {
        $clientNotNull = false;
        foreach ($this->clients as $client) {
            $clientInfo = $client['info'];
            $requiredInfo = ['first_name', 'last_name', 'dob'];

            $allInfoNotNull = array_reduce($requiredInfo, function ($carry, $field) use ($clientInfo) {
                return $carry && isNotNullAndNotEmptyString($clientInfo[$field]);
            }, true);

            if ($allInfoNotNull) {
                if (empty($clientInfo['relatives'])) {
                    $clientNotNull = true;
                } else {
                    $allRelativesNotNull = array_reduce($clientInfo['relatives'], function ($carry, $relative) {
                        return $carry && isNotNullAndNotEmptyString($relative['fullname']) &&
                            isNotNullAndNotEmptyString($relative['phone_number']) &&
                            isNotNullAndNotEmptyString($relative['relative_status_id']);
                    }, true);

                    if ($allRelativesNotNull) {
                        $clientNotNull = true;
                    }
                }
            }
        }

        $this->clientsForm = $clientNotNull;
    }
}
