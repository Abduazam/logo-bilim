<?php

namespace App\Livewire\Information\Statuses\Appointments;

use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Helpers\Services\Livewire\Translations\GetLanguagesForTranslations;
use App\Livewire\Information\Statuses\Appointments\Forms\AppointmentStatusCreateForm;
use App\Services\Dashboard\Information\Statuses\AppointmentStatuses\Create\AppointmentStatusCreateService;
use Exception;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    use DispatchingTrait;

    public AppointmentStatusCreateForm $form;

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
            $service = new AppointmentStatusCreateService($validatedData);
            $response = $service->callMethod();

            $title = $this->form->translations[app()->getLocale()];

            if ($response) {
                $this->dispatch('refresh');
                $this->dispatchSuccess('fa fa-check text-success', 'created-successfully', "<b>New appointment status:</b> {$title}");
                $this->form->reset();
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.information.statuses.appointments.create');
    }
}
