<?php

namespace App\Livewire\Information\Branches;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Livewire\Information\Branches\Forms\BranchCreateForm;
use App\Livewire\Information\Branches\Traits\ActionOnServices;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Repositories\Dashboard\Information\Services\ServiceRepository;
use App\Services\Dashboard\Information\Branches\Create\BranchCreateService;

class Create extends Component
{
    use DispatchingTrait, ActionOnServices;

    public BranchCreateForm $form;

    public function mount(ServiceRepository $serviceRepository): void
    {
        $this->services = $serviceRepository->getAll()->pluck('title', 'id')->map(function ($title) {
            return [
                'title' => $title,
                'price' => null,
            ];
        })->all();
    }

    /**
     * @throws Exception
     */
    public function create(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new BranchCreateService($validatedData);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatch('refresh');
                $this->dispatchForCreate('branch', $this->form->title);
                $this->form->reset();
                $this->mount(new ServiceRepository());
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.information.branches.create', [
            'services' => $this->services,
        ]);
    }
}
