<?php

namespace App\Livewire\Information\Teachers;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Livewire\Information\Teachers\Forms\TeacherCreateForm;
use App\Contracts\Traits\Dashboard\Livewire\General\RemoveFileTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Repositories\Dashboard\Information\Branches\BranchRepository;
use App\Livewire\Information\Teachers\Traits\ActionOnBranchAndService;
use App\Services\Dashboard\Information\Teachers\Create\TeacherCreateService;

class Create extends Component
{
    use WithFileUploads;
    use DispatchingTrait, RemoveFileTrait, ActionOnBranchAndService;

    public TeacherCreateForm $form;

    public function mount(): void
    {
        $this->branches = (new BranchRepository())->getAll()->pluck('title', 'id')->all();
    }

    /**
     * @throws Exception
     */
    public function create()
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new TeacherCreateService($validatedData);
            $response = $service->callMethod();

            if ($response) {
                if ($this->dispatching) {
                    $this->dispatchForCreate('teacher', $this->form->fullname);
                    $this->form->reset();
                    $this->reset('branch_id', 'branches', 'service_id', 'service_id');
                    $this->mount();
                } else {
                    return to_route('dashboard.information.teachers.index');
                }
            } else {
                throw $response;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.information.teachers.create');
    }
}
