<?php

namespace App\Livewire\Home;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;
use App\Repositories\Dashboard\Management\Appointments\AppointmentRepository;
use App\Repositories\Dashboard\Management\Consumptions\ConsumptionRepository;
use App\Repositories\Dashboard\Management\Consultations\ConsultationRepository;

class TopCards extends Component
{
    #[On('consumption-in-outside')]
    public function render(
        AppointmentRepository $appointmentRepository,
        ConsultationRepository $consultationRepository,
        ConsumptionRepository $consumptionRepository,
    ): View
    {
        return view('livewire.home.top-cards', [
            'totalAppointments' => $appointmentRepository->getTotalInToday(),
            'todaysAppointments' => $appointmentRepository->getTotalCreatedInToday(),

            'totalConsultations' => $consultationRepository->getTotalInToday(),
            'totalNextConsultations' => $consultationRepository->getTotalNextHours(),

            'totalConsumptions' => $consumptionRepository->getTotalInToday(),
            'sumConsumptions' => $consumptionRepository->getSumInToday(),
        ]);
    }
}
