<?php

namespace App\Livewire\Information\Statuses\Appointments\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Helpers\Services\Livewire\Translations\GetExistingTranslations;
use App\Models\Dashboard\Information\AppointmentStatuses\AppointmentStatus;

class AppointmentStatusUpdateForm extends Form
{
    #[Validate([
        'translations' => 'required|array',
        'translations.*' => 'required|string|min:2',
    ], as: [
        'translations' => 'appointment status',
        'translations.*' => 'appointment status',
    ])]
    public array $translations = [];

    public function setValues(AppointmentStatus $appointmentStatus): void
    {
        $translations = new GetExistingTranslations();
        $this->translations = $translations->getExistingTranslations($appointmentStatus);
    }
}
