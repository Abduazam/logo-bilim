<?php

namespace App\Livewire\Features\Languages;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Traits\Livewire\General\DataTrait;
use App\Models\Features\Languages\Language;
use Illuminate\Validation\ValidationException;
use App\Traits\Livewire\General\DispatchTrait;
use App\Livewire\Features\Languages\Forms\LanguageForm;
use App\Services\Features\Languages\Delete\LanguageDeleteService;

class Delete extends Component
{
    use DataTrait, DispatchTrait, WithFileUploads;

    public LanguageForm $form;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount(Language $item): void
    {
        $this->form->setValues($item);
    }

    /**
     * @throws Exception
     */
    public function delete(): void
    {
        try {
            $this->validate();

            $service = new LanguageDeleteService($this->form->language);
            $service->callMethod();

            $this->dispatchActionSuccess('fa fa-check text-success', 'deleting-successful', $this->form->title);
            $this->dispatch('refresh');
        } catch (ValidationException $e) {
            $this->dispatchValidateError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.features.languages.delete');
    }
}
