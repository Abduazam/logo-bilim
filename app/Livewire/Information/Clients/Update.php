<?php

namespace App\Livewire\Information\Clients;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Models\Dashboard\Information\Clients\Client;
use App\Livewire\Information\Clients\Forms\ClientUpdateForm;
use App\Livewire\Information\Clients\Traits\ActionOnRelative;
use App\Contracts\Traits\Dashboard\Livewire\General\RemoveFileTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Clients\Client\Update\ClientUpdateService;
use App\Repositories\Dashboard\Information\RelativeStatuses\RelativeStatusRepository;

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
                    $this->dispatchSuccess('fa fa-pen text-info', 'updated-successfully', "<b>Client updated:</b> {$this->form->first_name} {$this->form->last_name}");
                } else {
                    return to_route('dashboard.information.clients.index');
                }
            } else {
                throw $response;
            }
        }
    }

    public function render(RelativeStatusRepository $relativeStatusRepository): View
    {
        return view('livewire.information.clients.update', [
            'relativeStatuses' => $relativeStatusRepository->getAll(),
        ]);
    }
}
