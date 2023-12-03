<?php

namespace App\Livewire\Information\RelativeStatuses;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Repositories\Dashboard\Features\Languages\LanguageRepository;
use App\Livewire\Information\RelativeStatuses\Forms\RelativeStatusCreateForm;
use App\Services\Dashboard\Information\RelativeStatuses\Create\RelativeStatusCreateService;

class Create extends Component
{
    use DispatchingTrait;

    public RelativeStatusCreateForm $form;

    public function mount(): void
    {
        $languages = (new LanguageRepository())->getAll()->toArray();
        $languageSlugs = array_column($languages, 'slug');
        $translations = array_fill_keys($languageSlugs, null);
        $this->form->translations = $translations;
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
        return view('livewire.information.relative-statuses.create');
    }
}
