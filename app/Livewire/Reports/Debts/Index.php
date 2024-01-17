<?php

namespace App\Livewire\Reports\Debts;

use Livewire\Component;
use Illuminate\View\View;
use App\Repositories\Dashboard\Reports\Debts\DebtRepository;
use App\Repositories\Dashboard\Information\Teachers\TeacherRepository;

class Index extends Component
{
    public ?string $begin_date = null;
    public ?string $end_date = null;
    public ?int $teacher_id = null;

    public function mount(): void
    {
        $this->begin_date = date('Y-m-d');
    }

    public function render(
        DebtRepository $debtRepository,
        TeacherRepository $teacherRepository,
    ): View
    {
        return view('livewire.reports.debts.index', [
            'appointments' => $debtRepository->getAppointmentFiltered($this->begin_date, $this->end_date, $this->teacher_id),
            'consultations' => $debtRepository->getConsultationFiltered($this->begin_date, $this->end_date),
            'teachers' => $teacherRepository->getByBranch()
        ]);
    }
}
