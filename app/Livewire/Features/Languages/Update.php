<?php

namespace App\Livewire\Features\Languages;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Features\Languages\Language;
use App\Livewire\Features\Languages\Forms\LanguageUpdateForm;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Features\Languages\Update\LanguageUpdateService;

class Update extends Component
{
    use DispatchingTrait;

    public Language $language;
    public LanguageUpdateForm $form;

    public function mount(): void
    {
        $this->form->setValues($this->language);
    }

    /**
     * @throws Exception
     */
    public function update(): void
    {
        $validatedData = $this->validate();
        if ($validatedData) {
            $title = $this->language->title;

            $service = new LanguageUpdateService($validatedData, $this->language);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatchMany(['refresh', 'refresh-language', 'updated']);
                $this->dispatchSuccess('fa fa-pen text-info', 'updated-successfully', "<b>Language updated:</b> {$title} => {$this->form->title}");
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.features.languages.update');
    }
}
