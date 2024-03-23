<?php

namespace App\Livewire\Information\Clients\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class ClientCreateForm extends Form
{
    #[Validate('nullable|numeric|exists:branches,id', as: 'dashboard.fields.branch_id', translate: true)]
    public ?int $branch_id = null;

    #[Validate('required|string|min:3|max:75', as: 'dashboard.fields.first_name', translate: true)]
    public ?string $first_name = null;

    #[Validate('required|string|min:3|max:75', as: 'dashboard.fields.last_name', translate: true)]
    public ?string $last_name = null;

    #[Validate('nullable|date', as: 'dashboard.fields.birth_date', translate: true)]
    public ?string $dob = null;

    #[Validate('nullable|string', as: 'dashboard.fields.diagnosis', translate: true)]
    public ?string $diagnosis = null;

    #[Validate('required|date', as: 'dashboard.fields.agreement_date', translate: true)]
    public ?string $agreement_date = null;

    #[Validate('nullable|image|mimes:jpg,jpeg,png,gif|max:5120')]
    public mixed $photo = null;

    #[Validate([
        'lessons' => 'nullable|array',
        'lessons.*' => 'array',
        'lessons.*.service_id' => 'required|numeric|exists:services,id',
        'lessons.*.teacher_id' => 'required|numeric|exists:teachers,id',
        'lessons.*.price' => 'required|numeric',
        'lessons.*.start_time' => 'required',
    ], as: [
        'lessons.*.service_id' => 'dashboard.fields.service_id',
        'lessons.*.teacher_id' => 'dashboard.fields.teacher_id',
        'lessons.*.price' => 'dashboard.fields.price',
        'lessons.*.start_time' => 'dashboard.fields.start_time',
    ], translate: true)]
    public array $lessons = [];

    #[Validate([
        'relatives' => 'nullable|array',
        'relatives.*' => 'array',
        'relatives.*.fullname' => 'required|string|min:3|max:100',
        'relatives.*.phone_number' => 'required|numeric|digits_between:9,15',
        'relatives.*.relative_status_id' => 'required|numeric|exists:relative_statuses,id',
    ], as: [
        'relatives.*.fullname' => 'dashboard.fields.fullname',
        'relatives.*.phone_number' => 'dashboard.fields.phone_number',
        'relatives.*.relative_status_id' => 'dashboard.fields.relative_status',
    ], translate: true)]
    public array $relatives = [];
}
