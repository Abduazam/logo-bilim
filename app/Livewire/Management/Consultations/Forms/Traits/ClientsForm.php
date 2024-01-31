<?php

namespace App\Livewire\Management\Consultations\Forms\Traits;

use Livewire\Attributes\Validate;
use Illuminate\Support\Collection;
use App\Models\Dashboard\Information\Clients\Client;
use App\Repositories\Dashboard\Information\Clients\ClientRepository;

trait ClientsForm
{
    public string $search = '';

    public ?Collection $searchedClients;

    #[Validate([
        'clients' => 'required|array',
        'clients.client_id' => 'nullable|numeric|exists:clients,id',
        'clients.info' => 'required|array',
        'clients.info.first_name' => 'required|string|min:3|max:75',
        'clients.info.last_name' => 'required|string|min:3|max:75',
        'clients.info.dob' => 'nullable|date',
        'clients.info.relatives' => 'nullable|array',
        'clients.info.relatives.*' => 'nullable|array',
        'clients.info.relatives.*.fullname' => 'required|string|min:3|max:100',
        'clients.info.relatives.*.phone_number' => 'required|numeric|digits_between:9,15',
        'clients.info.relatives.*.relative_status_id' => 'required|numeric|exists:relative_statuses,id',
    ], as: [
        'clients.info.first_name' => 'first name',
        'clients.info.last_name' => 'last name',
        'clients.info.dob' => 'date of birth',
        'clients.info.relatives.*.fullname' => 'fullname',
        'clients.info.relatives.*.phone_number' => 'phone number',
        'clients.info.relatives.*.relative_status_id' => 'status',
    ])]
    public array $clients = [
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

    public function setClientInfo(Client $client): void
    {
        $this->clients['client_id'] = $client->id;
        $this->clients['info'] = [
            'first_name' => $client->first_name,
            'last_name' => $client->last_name,
            'dob' => $client->dob,
        ];

        $this->clearSearch();
        $this->setClientName();

        $this->checkRegistrationFormTrue();
    }

    public function clearClientInfo(): void
    {
        $this->clients = [
            'client_id' => null,
            'info' => [
                'first_name' => null,
                'last_name' => null,
                'dob' => null,
                'relatives' => [],
            ],
        ];

        $this->checkRegistrationFormTrue();
    }

    public function addRelative(): void
    {
        $this->clients['info']['relatives'][] = $this->relative;

        $this->checkRegistrationFormTrue();
    }

    public function removeRelative(int $relativeIndex): void
    {
        unset($this->clients['info']['relatives'][$relativeIndex]);
    }

    public function validateClient(): bool
    {
        $clientNotNull = false;
        if (isNotNullAndNotEmptyString($this->clients['info']['first_name']) && isNotNullAndNotEmptyString($this->clients['info']['last_name'])) {
            $clientNotNull = true;
        }

        if (array_key_exists('relatives', $this->clients['info'])) {
            if (!empty($this->clients['info']['relatives'])) {
                foreach ($this->clients['info']['relatives'] as $relative) {
                    if (isNotNullAndNotEmptyString($relative['fullname']) && isNotNullAndNotEmptyString($relative['phone_number']) && isNotNullAndNotEmptyString($relative['relative_status_id'])) {
                        $clientNotNull = true;
                    } else {
                        $clientNotNull = false;
                        break;
                    }
                }
            }
        }

        return $clientNotNull;
    }
}
