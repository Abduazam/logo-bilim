<?php

namespace App\Livewire\Information\Clients;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Livewire\Information\Clients\Forms\ClientCreateForm;
use App\Livewire\Information\Clients\Traits\ActionOnRelative;
use App\Contracts\Traits\Dashboard\Livewire\General\RemoveFileTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Clients\Client\Create\ClientCreateService;
use App\Repositories\Dashboard\Information\RelativeStatuses\RelativeStatusRepository;

class Create extends Component
{
    use WithFileUploads;
    use DispatchingTrait, RemoveFileTrait, ActionOnRelative;

    public ClientCreateForm $form;

    /**
     * @throws Exception
     */
    public function create()
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new ClientCreateService($validatedData);
            $response = $service->callMethod();

            if ($response) {
                if ($this->dispatching) {
                    $this->dispatchSuccess('fa fa-check text-success', 'created-successfully', "<b>New client:</b> {$this->form->first_name} {$this->form->last_name}");
                    $this->form->reset();
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
        return view('livewire.information.clients.create', [
            'relativeStatuses' => $relativeStatusRepository->getAll(),
        ]);
    }
}
