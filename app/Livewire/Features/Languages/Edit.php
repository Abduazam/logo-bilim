<?php

namespace App\Livewire\Features\Languages;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Traits\Livewire\General\DataTrait;
use App\Models\Features\Languages\Language;
use App\Traits\Livewire\General\DispatchTrait;
use Illuminate\Validation\ValidationException;
use App\Livewire\Features\Languages\Forms\LanguageForm;
use App\Services\Features\Languages\Edit\LanguageEditService;

class Edit extends Component
{
    use DataTrait, DispatchTrait, WithFileUploads;

    public LanguageForm $form;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount(Language $item): void
    {
        $this->form->setValues($item);
    }

    public function removeImage(): void
    {
        $this->form->language->thumbnail = null;
        $this->form->removeImage = true;
    }

    /**
     * @throws Exception
     */
    public function edit(): void
    {
        try {
            $this->validate();

            $service = new LanguageEditService($this->form);
            $service->callMethod();

            $this->dispatchActionSuccess('fa fa-check text-success', 'editing-successful', $this->form->title);
            $this->dispatch('refresh');
            $this->form->resetValues();
        } catch (ValidationException $e) {
            $this->dispatchValidateError($e);
        }
    }

    public function render(): View
    {
        return view('livewire.features.languages.edit');
    }
}