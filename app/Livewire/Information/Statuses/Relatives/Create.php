<?php

namespace App\Livewire\Information\Statuses\Relatives;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Helpers\Services\Livewire\Translations\GetLanguagesForTranslations;
use App\Livewire\Information\Statuses\Relatives\Forms\RelativeStatusCreateForm;
use App\Services\Dashboard\Information\RelativeStatuses\Create\RelativeStatusCreateService;

class Create extends Component
{
    use DispatchingTrait;

    public RelativeStatusCreateForm $form;

    public function mount(): void
    {
        $translations = new GetLanguagesForTranslations();
        $this->form->translations = $translations->getLanguageSlugs();
    }

    /**
     * @throws Exception
     */
    public function create(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new RelativeStatusCreateService($validatedData);
            $response = $service->callMethod();

            $title = $this->form->translations[app()->getLocale()];

            if ($response) {
                $this->dispatch('refresh');
                $this->dispatchSuccess('fa fa-check text-success', 'created-successfully', "<b>New relative status:</b> {$title}");
                $this->form->reset();
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.information.statuses.relatives.create');
    }
}
