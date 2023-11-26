<?php

namespace App\Livewire\Information\Teachers;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Information\Teachers\Teacher;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Teachers\Delete\TeacherDeleteService;

class Delete extends Component
{
    use DispatchingTrait;

    public Teacher $teacher;

    /**
     * @throws Exception
     */
    public function delete(): void
    {
        $service = new TeacherDeleteService($this->teacher);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-trash text-danger', 'deleted-successfully', "<b>Teacher deleted:</b> {$this->teacher->fullname}");
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.information.teachers.delete');
    }
}
