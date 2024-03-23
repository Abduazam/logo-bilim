<?php

namespace App\Livewire\Information\Clients\Traits;

use App\Helpers\Services\Livewire\Hours\GenerateWorkHours;
use App\Models\Dashboard\Information\Services\Service;
use App\Repositories\Dashboard\Information\Services\ServiceRepository;
use App\Repositories\Dashboard\Information\Teachers\TeacherRepository;
use Illuminate\Database\Eloquent\Collection;

trait ActionOnLesson
{
    public ?Collection $services = null;
    public ?Collection $teachers = null;
    public array $start_times = [];

    public function addLesson(): void
    {
        $this->form->lessons[] = $this->generateLesson();

        if (is_null($this->services)) {
            $this->getServices();
        }

        if (is_null($this->teachers)) {
            $this->getTeachers();
        }

        if (empty($this->start_times)) {
            $this->getStartTimes();
        }
    }

    public function removeLesson(int $id): void
    {
        unset($this->form->lessons[$id]);
    }

    private function generateLesson(): array
    {
        return [
            'service_id' => null,
            'teacher_id' => null,
            'price' => null,
            'start_time' => null,
        ];
    }

    private function getServices(): void
    {
        $servicesRepository = new ServiceRepository();
        $this->services = $servicesRepository->getAll();
    }

    private function getTeachers(): void
    {
        $teacherRepository = new TeacherRepository();
        $this->teachers = $teacherRepository->getByBranch();
    }

    private function setPrice(int $lessonId): void
    {
        if (isset($this->form->lessons[$lessonId]['service_id'], $this->form->branch_id)) {
            $service = Service::findOrFail($this->form->lessons[$lessonId]['service_id']);
            $this->form->lessons[$lessonId]['price'] = $service->getPrice($this->form->branch_id);
        }
    }

    private function getStartTimes(): void
    {
        $getHoursHelper = new GenerateWorkHours();
        $this->start_times = $getHoursHelper->generate();
    }
}
