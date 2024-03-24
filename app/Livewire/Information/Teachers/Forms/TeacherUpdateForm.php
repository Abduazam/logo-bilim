<?php

namespace App\Livewire\Information\Teachers\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\Dashboard\Information\Teachers\Teacher;

class TeacherUpdateForm extends Form
{
    #[Validate('required|string|min:3', as: 'dashboard.fields.fullname', translate: true)]
    public ?string $fullname = null;

    #[Validate('nullable|date', as: 'dashboard.fields.birth_date', translate: true)]
    public ?string $dob = null;

    #[Validate('nullable|numeric|unique:teachers,phone_number', as: 'dashboard.fields.phone_number', translate: true)]
    public ?string $phone_number = null;

    #[Validate('nullable|image|mimes:jpg,jpeg,png,gif|max:5120', as: 'dashboard.fields.photo', translate: true)]
    public mixed $photo = null;

    #[Validate([
        'teacher_services' => 'required|array',
        'teacher_services.*' => 'required|array',
        'teacher_services.*.*' => 'required|array',
        'teacher_services.*.*.salary' => 'nullable|numeric',
    ], as: [
        'teacher_services' => 'dashboard.fields.teacher_services',
        'teacher_services.*.*.salary' => 'dashboard.fields.salary',
    ], translate: true)]
    public array $teacher_services = [];

    public function setValues(Teacher $teacher): void
    {
        $this->fullname = $teacher->fullname;
        $this->dob = $teacher->dob;
        $this->phone_number = $teacher->phone_number;
        $this->photo = $teacher->photo;

        foreach ($teacher->myServices as $service) {
            $this->teacher_services[$service->branch_id][$service->service_id] = [
                'branch_title' => $service->branch->title,
                'service_title' => $service->service->title,
                'price' => $service->service->getPrice($service->branch->id),
                'salary' => $service->salary,
            ];
        }
    }
}
