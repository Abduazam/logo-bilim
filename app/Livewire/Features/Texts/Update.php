<?php

namespace App\Livewire\Features\Texts;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Features\Texts\Text;
use App\Livewire\Features\Texts\Forms\TextUpdateForm;
use App\Services\Dashboard\Features\Texts\Update\TextUpdateService;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;

class Update extends Component
{
    use DispatchingTrait;

    public Text $text;
    public TextUpdateForm $form;

    public function mount(): void
    {
        $this->form->setValues($this->text);
    }

    /**
     * @throws Exception
     */
    public function update(): void
    {
        $validatedData = $this->validate();
        if ($validatedData) {
            $changes = $this->generateChangesText($validatedData['form']['translations']);

            $service = new TextUpdateService($validatedData, $this->text);
            $response = $service->callMethod();

            if ($response) {
                $this->dispatch('refresh');
                $this->dispatchSuccess('fa fa-pen text-info', 'updated-successfully', $this->form->key . " => [<br>$changes]");
            } else {
                throw $response;
            }
        }
    }

    private function generateChangesText(array $translations): string
    {
        $changes = '';
        foreach ($translations as $key => $translation) {
            $changes .= " &nbsp;&nbsp;&nbsp;$key: $translation<br>";
        }

        return $changes;
    }

    public function render(): View
    {
        return view('livewire.features.texts.update');
    }
}
