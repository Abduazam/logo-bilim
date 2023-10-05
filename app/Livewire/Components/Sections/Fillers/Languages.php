<?php

namespace App\Livewire\Components\Sections\Fillers;

use Livewire\Component;
use Illuminate\View\View;
use App\Repositories\Dashboard\Features\Languages\LanguageRepository;

class Languages extends Component
{
    protected $listeners = ['refresh-language' => '$refresh'];

    public function render(LanguageRepository $repository): View
    {
        return view('components.sections.fillers.languages', [
            'current_language' => $repository->getCurrent(),
            'languages' => $repository->getAll()
        ]);
    }
}
