<?php

namespace App\Livewire\Information\Teachers\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class TeacherCreateForm extends Form
{
    #[Validate('required|string|min:3')]
    public ?string $fullname = null;

    #[Validate('nullable|date', as: 'date of birth')]
    public ?string $dob = null;

    #[Validate('nullable|numeric')]
    public ?string $phone_number = null;

    #[Validate('nullable|image|mimes:jpg,jpeg,png,gif|max:5120')]
    public mixed $photo = null;

    #[Validate([
        'teacher_services' => 'required|array',
        'teacher_services.*' => 'required|array',
        'teacher_services.*.*' => 'required|array',
        'teacher_services.*.*.salary' => 'required|numeric',
    ], as: [
        'teacher_services.*.*.salary' => 'salary',
    ])]
    public array $teacher_services = [];
}
