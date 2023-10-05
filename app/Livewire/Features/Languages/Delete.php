<?php

namespace App\Livewire\Features\Languages;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;
use App\Models\Dashboard\Features\Languages\Language;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Features\Languages\Delete\LanguageDeleteService;

class Delete extends Component
{
    use DispatchingTrait;

    public Language $language;

    /**
     * @throws Exception
     */
    public function delete(): void
    {
        $service = new LanguageDeleteService($this->language);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatchMany(['refresh', 'refresh-language']);
            $this->dispatchSuccess('fa fa-trash text-danger', 'deleted-successfully', $this->language->title);
        } else {
            throw $response;
        }
    }

    #[On('updated')]
    public function render(): View
    {
        return view('livewire.features.languages.delete');
    }
}
