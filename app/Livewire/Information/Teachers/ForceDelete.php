<?php

namespace App\Livewire\Information\Teachers;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Information\Teachers\Teacher;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Teachers\ForceDelete\TeacherForceDeleteService;

class ForceDelete extends Component
{
    use DispatchingTrait;

    public Teacher $teacher;

    /**
     * @throws Exception
     */
    public function forceDelete(): void
    {
        $service = new TeacherForceDeleteService($this->teacher);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchForForceDelete('teacher', $this->teacher->fullname);
        } else {
            throw $response;
        }
    }

    public function render(): View
    {
        return view('livewire.information.teachers.force-delete');
    }
}
