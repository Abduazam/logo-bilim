<?php

namespace App\Livewire\Management\Consultations\Lists;

use Livewire\Component;
use Illuminate\View\View;
use App\Repositories\Dashboard\Information\Types\Payments\PaymentRepository;
use App\Repositories\Dashboard\Management\Consultations\ConsultationRepository;
use App\Repositories\Dashboard\Information\Statuses\Appointments\AppointmentRepository;

class ConsultationsList extends Component
{
    public int $payment_type_id = 0;
    public int $consultation_status_id = 0;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(
        ConsultationRepository $consultationRepository,
        PaymentRepository $paymentRepository,
        AppointmentRepository $appointmentStatusRepository,
    ): View
    {
        return view('livewire.management.consultations.lists.consultations-list', [
            'consultations' => $consultationRepository->getFiltered($this->payment_type_id, $this->consultation_status_id),
            'paymentTypes' => $paymentRepository->getAll(),
            'appointmentStatuses' => $appointmentStatusRepository->getAll(),
        ]);
    }
}
