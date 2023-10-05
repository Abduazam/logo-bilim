<?php

namespace App\Livewire\Features\Languages;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Livewire\Features\Languages\Forms\LanguageCreateForm;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Features\Languages\Create\LanguageCreateService;

class Create extends Component
{
    use DispatchingTrait;

    public LanguageCreateForm $form;

    /**
     * @throws Exception
     */
    public function create(): void
    {
        $validatedData = $this->validate();
        if ($validatedData) {
            $service = new LanguageCreateService($validatedData);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatchMany(['refresh', 'refresh-language']);
                $this->dispatchSuccess('fa fa-check text-success', 'created-successfully', $this->form->title);
                $this->form->reset();
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.features.languages.create');
    }
}
