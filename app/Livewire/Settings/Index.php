<?php

namespace App\Livewire\Settings;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Livewire\Settings\Forms\SettingsUserUpdateForm;
use App\Contracts\Traits\Dashboard\Livewire\General\RemoveFileTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Settings\Update\SettingsUserUpdateService;
use App\Contracts\Traits\Dashboard\Livewire\General\ShowPasswordTrait;

class Index extends Component
{
    use WithFileUploads;
    use ShowPasswordTrait, DispatchingTrait, RemoveFileTrait;

    public User $user;
    public SettingsUserUpdateForm $form;

    public function mount(): void
    {
        $this->form->setValues($this->user);
    }

    /**
     * @throws Exception
     */
    public function update(): void
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new SettingsUserUpdateService($validatedData, $this->user);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatchSuccess('fa fa-pen text-info', 'updated-successfully', "<b>Info updated:</b> {$this->form->name}");
                $this->mount();
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.settings.index');
    }
}
