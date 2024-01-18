<?php

namespace App\Livewire\Reports\Debts;

use Livewire\Component;
use Illuminate\View\View;
use App\Repositories\Dashboard\Reports\Debts\DebtRepository;
use App\Contracts\Traits\Dashboard\Livewire\General\ReportFilterTrait;
use App\Repositories\Dashboard\Information\Teachers\TeacherRepository;

class Index extends Component
{
    use ReportFilterTrait;

    public function mount(): void
    {
        $this->setDefaultBeginDate();
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
