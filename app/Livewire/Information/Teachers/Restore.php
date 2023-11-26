<?php

namespace App\Livewire\Information\Teachers;

use Exception;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Dashboard\Information\Teachers\Teacher;
use App\Contracts\Traits\Dashboard\Livewire\General\DispatchingTrait;
use App\Services\Dashboard\Information\Teachers\Restore\TeacherRestoreService;

class Restore extends Component
{
    use DispatchingTrait;

    public Teacher $teacher;

    /**
     * @throws Exception
     */
    public function restore(): void
    {
        $service = new TeacherRestoreService($this->teacher);
        $response = $service->callMethod();

        if ($response) {
            $this->dispatch('refresh');
            $this->dispatchSuccess('fa fa-rotate-left text-primary', 'restored-successfully', "<b>Teacher restored:</b> {$this->teacher->fullname}");
        } else {
            throw $response;
        }
    }
    public function render(): View
    {
        return view('livewire.information.teachers.restore');
    }
}
