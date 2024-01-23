<?php

namespace App\Livewire\Information\Clients;

use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\RemoveFileTrait;
use App\Livewire\Information\Clients\Forms\ClientUpdateForm;
use App\Livewire\Information\Clients\Traits\ActionOnRelative;
use App\Models\Dashboard\Information\Clients\Client;
use App\Repositories\Dashboard\Information\Statuses\Relatives\RelativeRepository;
use App\Services\Dashboard\Information\Clients\Client\Update\ClientUpdateService;
use Exception;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    use DispatchingTrait, RemoveFileTrait, ActionOnRelative;

    public Client $client;
    public ClientUpdateForm $form;

    public function mount(): void
    {
        $this->form->setValues($this->client);
    }

    /**
     * @throws Exception
     */
    public function update()
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new ClientUpdateService($validatedData, $this->client);
            $response = $service->callMethod();

            if ($response) {
                if ($this->dispatching) {
                    $this->dispatchForUpdate('client', $this->form->first_name . ' ' . $this->form->last_name);
                } else {
                    return to_route('dashboard.information.clients.index');
                }
            } else {
                throw $response;
            }
        }
    }

    public function render(RelativeRepository $relativeStatusRepository): View
    {
        return view('livewire.information.clients.update', [
            'relativeStatuses' => $relativeStatusRepository->getAll(),
        ]);
    }
}
