<?php

namespace App\Livewire\Information\Teachers;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Models\Dashboard\Information\Teachers\Teacher;
use App\Livewire\Information\Teachers\Forms\TeacherUpdateForm;
use App\Contracts\Traits\Dashboard\Livewire\General\RemoveFileTrait;
use App\Repositories\Dashboard\Information\Branches\BranchRepository;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Livewire\Information\Teachers\Traits\ActionOnBranchAndService;
use App\Services\Dashboard\Information\Teachers\Update\TeacherUpdateService;

class Update extends Component
{
    use WithFileUploads;
    use DispatchingTrait, RemoveFileTrait, ActionOnBranchAndService;

    public Teacher $teacher;
    public TeacherUpdateForm $form;

    public function mount(): void
    {
        $this->branches = (new BranchRepository())->getAll()->pluck('title', 'id')->all();
        $this->form->setValues($this->teacher);
    }

    /**
     * @throws Exception
     */
    public function update()
    {
        $validatedData = $this->form->validate();

        if ($validatedData) {
            $service = new TeacherUpdateService($validatedData, $this->teacher);
            $response = $service->callMethod();

            if ($response) {
                if ($this->dispatching) {
                    $this->dispatchSuccess('fa fa-pen text-info', 'updated-successfully', "<b>Teacher updated:</b> {$this->form->fullname}");
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
        return view('livewire.information.teachers.update');
    }
}
